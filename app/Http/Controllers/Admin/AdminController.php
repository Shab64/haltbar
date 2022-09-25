<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\RalawiseImport;
use App\Imports\UsersImport;
use App\Models\Admin;
use App\Models\Ralawise;
use App\Models\RalawisePricing;
use App\Models\Slider;
use App\Models\Uneek;
use App\Models\UneekPricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use EllGreen\LaravelLoadFile\Laravel\Facades\LoadFile;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required | min:8 | max: 30'
        ]);

        $cred = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($cred)) {
            return redirect()->to('admin');
        } else {
            return back()->with('fail', 'Invalid Credentials!');
        }
    }
    function view($page)
    {
        $data = [];
        if ($page === "ralawise") {
            // $r = Ralawise::paginate(15)->withQueryString();
            $r = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_suggested_categories', 'product_styles.code', '=', 'product_suggested_categories.product_style_code')
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->paginate(15);

            $data['ralawise'] = $r;
        }

        if ($page === "uneek") {
            $u = Uneek::paginate(15)->withQueryString();
            $data['uneek'] = $u;
        }
        $data['all_sliders'] = Slider::all();

        return view('admin.' . $page, $data);
    }
    function viewIndividual(Request $request)
    {
        $type = $request->input('type');
        $product_id = $request->input('product_id');
        $data = [];
        if ($type === "ralawise") {
            $data['single_product'] = json_decode(Ralawise::find($product_id), true);
            $data['ralawise_pricings'] = json_decode(RalawisePricing::all(), true);
            return view('admin.ralawise-product-details', $data);
        } elseif ($type === "uneek") {
            $data['single_product'] = json_decode(Uneek::find($product_id), true);
            $data['uneek_pricings'] = json_decode(UneekPricing::all(), true);
            return view('admin.uneek-product-details', $data);
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    //download and upload csv file methods
    public function download_uneek()
    {
        // Initialize a file URL to the variable
        $url = 'https://uneekweb.azurewebsites.net/UneekDocs/stock_levels.csv';

        // Initialize the cURL session
        $ch = curl_init($url);
        // Initialize directory name where
        // file will be save
        $dir = 'assets/uneek/sync_uneek';
        // Use basename() function to return
        // the base name of file
        $file_name = basename($url);
        // Save file into file location
        $save_file_loc = $dir . '/' . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);
        // Closes a cURL session and frees all resources
        curl_close($ch);
        // Close file
        fclose($fp);
        $this->scan_uneek();
    }
    //download csv from ralawise
    public function download_csv()
    {
        // var_dump("ADssda"); die;
        $connection_id = ftp_connect("upload.ralawise.com");
        $ftp_username = "HA522";
        $ftp_password = "W5<rDrzY9Q";

        $file_path_my_pc = 'public/assets/ralawise/sync_ralawise';
        $file_path_ftp_server = "/Stock/Stock_Update.csv";

        $login = ftp_login($connection_id, $ftp_username, $ftp_password);

        if (!$login) {
            echo "Connection to ftp server has failed!! ";
            exit;
        } else {
            echo "Connected has be done!!";
        }
        ftp_pasv($connection_id, true);
        if (ftp_get($connection_id, $file_path_my_pc . '/ralawise.csv', $file_path_ftp_server, FTP_ASCII)) {
            echo "File has been downloaded!!";
            $this->scan_csv();
            ftp_close($connection_id);
            return true;
        } else {
            ftp_close($connection_id);
            echo "fail ... ";
            echo "Connected has be stopped!!";
            return false;
        }
    }
    public function scan_uneek()
    {
        $dir = 'assets/uneek/sync_uneek';
        $csv = array_diff(scandir($dir), array('..', '.'));
        if (!empty($csv[2])) {
            $this->update_uneek_csv(null, null, $dir . '/' . $csv[2]);
        }
    }
    public function scan_csv()
    {
        $dir = 'assets/ralawise/sync_ralawise';
        $csv = array_diff(scandir($dir), array('..', '.'));
        if (!empty($csv[2])) {
            $this->csv(null, null, $dir . '/' . $csv[2]);
        }
    }
    public function update_uneek_csv($table, $page, $csv_file = null)
    {
        // $x = $this->do_upload("file");
        // if (!empty($x['upload_data'])) {
        //     $file = $x['upload_data']['full_path'];
        // } else {
        $file = $csv_file;
        // }
        $file = fopen($file, 'r');
        $headers = fgetcsv($file);
        $data = [];
        while (($row = fgetcsv($file)) !== false) {
            $item = [];
            foreach ($row as $key => $value) {
                $item[str_replace(' ', '_', $headers[$key])] = $value ?: null;
            }
            //update in database
            $uneek = Uneek::get()->where('Full_Description', $item['Description']);
            $uneek->SingleQuantity = $item['Stock'];
            $uneek->save();
            // $this->data->update(array('Full_Description' => $item['Description']), "uneek", array('SingleQuantity' => $item['Stock']));
            $data[] = $item;
        }
        fclose($file);
    }
    public function csv($table, $page, $csv_file = null)
    {
        $x = $this->do_upload("file");
        if (!empty($x['upload_data'])) {
            $file = $x['upload_data']['full_path'];
        } else {
            $file = $csv_file;
        }
        $file = fopen($file, 'r');
        $headers = fgetcsv($file);
        unset($headers[7]);
        $headers[7] = 'EAN_Bar_Code';
        $data = [];
        while (($row = fgetcsv($file)) !== false) {
            $item = [];
            foreach ($row as $key => $value) {
                $item[str_replace(' ', '_', $headers[$key])] = $value ?: null;
            }
            // 		$this->data->insert($table,$item);
            $ralawise = Ralawise::get()->where('SkuCode', $item['SKU']);
            $ralawise->SingleQuantity = $item['Quantity'];
            $ralawise->save();
            // $this->data->update(array('SkuCode' => $item['SKU']), "product2", array('SingleQuantity' => $item['Quantity']));
            $data[] = $item;
        }
        fclose($file);
    }
    public function uploadRalawise(Request $request)
    {
        set_time_limit(0);
        Excel::import(new RalawiseImport, $request->csv_file);

        //        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
    function updateChanges(Request $request)
    {
        $supplier = $request->supplier;

        $ids = $request->ids;
        $discounts = $request->discounts;
        $multipliers = $request->multipliers;
        if ($supplier === "ralawise") {
            if (!empty($ids)) {
                foreach ($ids as $k => $id) {
                    $ralawise = RalawisePricing::find($id);
                    $ralawise->discount_per_percent = $discounts[$k];
                    $ralawise->service_charges_pp = $multipliers[$k];
                    $ralawise->save();
                }
            }
        } else if ($supplier === "uneek") {
            if (!empty($ids)) {
                foreach ($ids as $k => $id) {
                    $uneek = UneekPricing::find($id);
                    $uneek->discount_per_percent = $discounts[$k];
                    $uneek->service_charges_pp = $multipliers[$k];
                    $uneek->save();
                }
            }
        }
        return redirect()->route('admin.index')->with('success', 'Changes saved successfully!');
    }
    function load_data_infile()
    {
        LoadFile::connection('mysql')
            ->file('Ralawise CSV reduced.csv', $local = false)
            ->into('product2')
            ->columns(['SkuCode, ProductColourCode, ProductGroup, Brand, PrimaryCategory, ProductName, Specification, RetailDescription, BulletText1, BulletText2,
 BulletText3, JacketLength, LegLength, WashingInstructions, Fabric, Weight, BagCapacity, PrintArea, Embroidery,Dimensions, SizeRange, SizeDescription,
  SizeInfo, SupplierCode, DirectoryPageNumber, PrimaryImage, ColourCode, ColourName, PrimaryColour, ColourImage, Alpha, SizeCode, WebSize, CartonQty,
   PackQty, VatCode, CartonPrice, PackPrice, SinglePrice, SkuStatus, WeightKG, CommodityCode, CountryOfOrigin'])
            ->fieldsTerminatedBy(',')
            ->linesTerminatedBy('\n')
            ->fieldsEnclosedBy('"')
            ->ignoreLines(1)
            ->load();
    }
}
