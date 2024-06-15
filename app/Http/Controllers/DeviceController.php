<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    function list()
    {
        return Device::all();
    }
    function findById($id)
    {
        return Device::find($id);
    }

    function findByIdOpt($id = null)
    {
        return $id ? Device::find($id) : Device::all();
    }

    function add(Request $req)
    {
        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["Results" => "Data has been added"];
        } else {
            return ["Results" => "Operation Failed"];
        }
    }

    function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();

        if ($result) {
            return ["result" => "data is updated"];
        } else {

            return ["result" => "update operation failed"];
        }
    }

    function search($name)
    {
        return Device::where("name", $name)->get();
    }
    function searchByChar($name)
    {
        return Device::where("name", "like", "%" . $name . "%")->get();
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {

            return ["Result" => "record has been delete"];
        } else {

            return ["Result" => "delete operateon failde"];
        }
    }

    function testData(Request $req)
    {
        $rules = $req->validate([
            "member_id" => "required|max:1"
        ]);
        if ($rules) {
            return ["x" => "y"];
        } else {
            return ["x" => "member_id is required"];
        }
    }
}
