<?php






























































namespace App\Imports;

use App\Models\Ralawise;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RalawiseImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Ralawise([

            'SkuCode'=>$row['skucode'],
            'ProductColourCode'=>$row['productcolourcode'],
            'ProductGroup'=>$row['productgroup'],
            'Brand'=>$row['brand'],
            'PrimaryCategory'=>$row['primarycategory'],
            'ProductName'=>$row['productname'],
            'Specification'=>$row['specification'],
            'RetailDescription'=>$row['retaildescription'],
            'BulletText1'=>$row['bullettext1'],
            'BulletText2'=>$row['bullettext2'],
            'BulletText3'=>$row['bullettext3'],
            'JacketLength'=>$row['jacketlength'],
            'LegLength'=>$row['leglength'],
            'WashingInstructions'=>$row['washinginstructions'],
            'Fabric'=>$row['fabric'],
            'Weight'=>$row['weight'],
            'BagCapacity'=>$row['bagcapacity'],
            'PrintArea'=>$row['printarea'],
            'Embroidery'=>$row['embroidery'],
            'Dimensions'=>$row['dimensions'],
            'SizeRange'=>$row['sizerange'],
            'SizeDescription'=>$row['sizedescription'],
            'SizeInfo'=>$row['sizeinfo'],
            'SupplierCode'=>$row['suppliercode'],
            'DirectoryPageNumber'=>$row['directorypagenumber'],
            'PrimaryImage'=>$row['primaryimage'],
            'ColourCode'=>$row['colourcode'],
            'ColourName'=>$row['colourname'],
            'PrimaryColour'=>$row['primarycolour'],
            'ColourImage'=>$row['colourimage'],
            'Alpha'=>$row['alpha'],
            'SizeCode'=>$row['sizecode'],
            'WebSize'=>$row['websize'],
            'CartonQty'=>$row['cartonqty'],
            'PackQty'=>$row['packqty'],
            'VatCode'=>$row['vatcode'],
            'CartonPrice'=>$row['cartonprice'],
            'PackPrice'=>$row['packprice'],
            'SinglePrice'=>$row['singleprice'],
            'SkuStatus'=>$row['skustatus'],
            'WeightKG'=>$row['weightkg'],
            'CommodityCode'=>$row['commoditycode'],
            'CountryOfOrigin'=>$row['countryoforigin']
        ]);
    }
}
