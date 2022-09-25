<?php

namespace App\Imports;

use App\Models\Ralawise;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Ralawise([

            'SkuCode'=>$row['SkuCode'],
            'ProductColourCode'=>$row['ProductColourCode'],
            'ProductGroup'=>$row['ProductGroup'],
            'Brand'=>$row['Brand'],
            'PrimaryCategory'=>$row['PrimaryCategory'],
            'ProductName'=>$row['ProductName'],
            'Specification'=>$row['Specification'],
            'RetailDescription'=>$row['RetailDescription'],
            'BulletText1'=>$row['BulletText1'],
            'BulletText2'=>$row['BulletText2'],
            'BulletText3'=>$row['BulletText3'],
            'JacketLength'=>$row['JacketLength'],
            'LegLength'=>$row['LegLength'],
            'WashingInstructions'=>$row['WashingInstructions'],
            'Fabric'=>$row['Fabric'],
            'Weight'=>$row['Weight'],
            'BagCapacity'=>$row['BagCapacity'],
            'PrintArea'=>$row['PrintArea'],
            'Embroidery'=>$row['Embroidery'],
            'Dimensions'=>$row['Dimensions'],
            'SizeRange'=>$row['SizeRange'],
            'SizeDescription'=>$row['SizeDescription'],
            'SizeInfo'=>$row['SizeInfo'],
            'SupplierCode'=>$row['SupplierCode'],
            'DirectoryPageNumber'=>$row['DirectoryPageNumber'],
            'PrimaryImage'=>$row['PrimaryImage'],
            'ColourCode'=>$row['ColourCode'],
            'ColourName'=>$row['ColourName'],
            'PrimaryColour'=>$row['PrimaryColour'],
            'ColourImage'=>$row['ColourImage'],
            'Alpha'=>$row['Alpha'],
            'SizeCode'=>$row['SizeCode'],
            'WebSize'=>$row['WebSize'],
            'CartonQty'=>$row['CartonQty'],
            'PackQty'=>$row['PackQty'],
            'VatCode'=>$row['VatCode'],
            'CartonPrice'=>$row['CartonPrice'],
            'PackPrice'=>$row['PackPrice'],
            'SinglePrice'=>$row['SinglePrice'],
            'SkuStatus'=>$row['SkuStatus'],
            'WeightKG'=>$row['WeightKG'],
            'CommodityCode'=>$row['CommodityCode'],
            'CountryOfOrigin'=>$row['CountryOfOrigin']
        ]);
    }
}
