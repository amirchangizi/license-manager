<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 2:30 PM
    */

    namespace Rasaco\LicenseManager\Http\Controllers;

    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;
    use ProcessMaker\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Rasaco\LicenseManager\Http\Requests\LicenceRequest;

    class LicenseManagerController extends Controller
    {
        public function index()
        {
            return view('license-manager::index');
        }


        public function store(LicenceRequest $request)
        {
            //get $licences file
            $licenseFile = file_get_contents(storage_path('/app/public/security-license.json'));
            //generate random string
            $randomString = Str::random(config('security-manager.length'));

            //remove random string from hash
            $result = str_replace(substr($licenseFile,2,config('security-manager.length')),"",$licenseFile);
            $licences = json_decode(base64_decode($result) ,true);
            $count = count(Arr::get($licences,'packages'));

            //check package not exists
            if(collect(Arr::get($licences,'packages'))->contains('name' ,$request->name))
                return view('license-manager::index');

            $licences['packages'][$count] = $request->all();
            $str = base64_encode(json_encode($licences));
            //add random string to base64
            $licenseString = substr_replace($str, $randomString, 2, 0);

            file_put_contents(storage_path('/app/public/security-license.json') , $licenseString );
            return view('license-manager::index');
        }

        public function update(Request $request, $license_generator)
        {

        }

        public function destroy(){

        }
    }
