[1mdiff --git a/.gitignore b/.gitignore[m
[1mindex 643080d..f0eb335 100644[m
[1m--- a/.gitignore[m
[1m+++ b/.gitignore[m
[36m@@ -12,4 +12,4 @@[m [mnpm-debug.log[m
 yarn-error.log[m
 [m
 #*.sqlite[m
[31m-#*.sqlite-journal[m
[32m+[m[32m#*.sqlite-journal[m
\ No newline at end of file[m
[1mdiff --git a/app/Models/testRepository.php b/Fatma Ibrahim,[m
[1msimilarity index 100%[m
[1mrename from app/Models/testRepository.php[m
[1mrename to Fatma Ibrahim,[m
[1mdiff --git a/Ibrahim Mohamed, b/Ibrahim Mohamed,[m
[1mnew file mode 100644[m
[1mindex 0000000..e69de29[m
[1mdiff --git a/Maszen Ibrahim, b/Maszen Ibrahim,[m
[1mnew file mode 100644[m
[1mindex 0000000..e69de29[m
[1mdiff --git a/app/Http/Controllers/BeneficiaryController.php b/app/Http/Controllers/BeneficiaryController.php[m
[1mnew file mode 100644[m
[1mindex 0000000..049ed9b[m
[1m--- /dev/null[m
[1m+++ b/app/Http/Controllers/BeneficiaryController.php[m
[36m@@ -0,0 +1,112 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App\Http\Controllers;[m
[32m+[m
[32m+[m[32muse Illuminate\Http\Request;[m
[32m+[m[32muse App\Models\File;[m
[32m+[m[32muse App\Models\Gender;[m
[32m+[m[32muse App\Models\Nationality;[m
[32m+[m[32muse App\Models\Beneficiary;[m
[32m+[m[32muse App\Models\Relationship;[m
[32m+[m
[32m+[m[32mclass BeneficiaryController extends Controller[m
[32m+[m[32m{[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Display a listing of the resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function index()[m
[32m+[m[32m    {[m
[32m+[m[32m        //[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Show the form for creating a new resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function create($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $file = File::find($id);[m
[32m+[m[32m        $genders = Gender::all();[m
[32m+[m[32m        $nationalities = Nationality::all();[m
[32m+[m[32m        $relationships = Relationship::all();[m
[32m+[m
[32m+[m		[32mreturn view('beneficiaries.create', compact('file', 'genders', 'nationalities', 'relationships'));[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Store a newly created resource in storage.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Illuminate\Http\Request  $request[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function store(Request $request)[m
[32m+[m[32m    {[m
[32m+[m[32m                $data = request()->validate([[m
[32m+[m[32m            'file_id' => 'required',[m
[32m+[m[32m            'individual_id' => 'required',[m
[32m+[m[32m            'passport_number' => '',[m
[32m+[m[32m            'name' => 'required',[m
[32m+[m[32m            'native_name' => 'required',[m
[32m+[m[32m            'age' => 'required',[m
[32m+[m[32m            'gender_id' => 'required',[m
[32m+[m[32m            'nationality_id' => 'required',[m
[32m+[m[32m            'relationship_id' => 'required',[m
[32m+[m[32m            'current_phone_number' => '',[m
[32m+[m[32m        ]);[m
[32m+[m[41m        [m
[32m+[m[41m        [m
[32m+[m[32m        //dd($data);[m
[32m+[m[41m        [m
[32m+[m[32m        $beneficiary = Beneficiary::create($data);[m
[32m+[m[41m        [m
[32m+[m[32m        return redirect()->route('files.show', [$request->input('file_id')]);[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Display the specified resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  int  $id[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function show($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        //[m
[32m+[m[