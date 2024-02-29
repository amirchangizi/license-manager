<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 2:30 PM
    */

    namespace Rasaco\LicenseManager\Http\Controllers;

    use ProcessMaker\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class LicenseManagerController extends Controller
    {
        public function index(){
            return view('package-skeleton::index');
        }

        public function store(Request $request){

        }

        public function update(Request $request, $license_generator){

        }

        public function destroy(){

        }
    }
