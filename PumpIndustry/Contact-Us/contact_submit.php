 
 <script>
   public function contact_submit(Request $request)
    {


    	$validator = Validator::make($request->all(), [
            'name' => 'required',
             'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'subject' => 'required',
            'comments' => 'comments',
        ]);


        if ($validator->passes()) {
date_default_timezone_set('Asia/Kolkata');
$input = $request->all();
Contact::create($input);


     $data = [
            'name' => $request->input('name'),
            'email'    => $request->input('email'),
            'description'=>$request->input('description'),
            'mobile'=>$request->input('mobile'),
            'comments'=>$request->input('subject'),
            

        ];
        
        
        Mail::send('emails.contact', $data, function($message)  use ($data) {
        
        $admin = DB::table('admins')->where('id', 1)->first();
        $data['emails'] = $admin->email;
        

        $message->to($data['emails'], 'pump')
        ->from('knarasimha615@gmail.com', 'pump')
        ->subject('contact - '.$data['name']);


        });
        
        if (Mail::failures()) {

        }else{
        }
        
        
        
                
                 $data1 = [
            'email'    => $request->input('email'),
             'name'    => $request->input('name'),
            'msg'    => 'Thank you for contacting us – we will get back to you soon!'

        ];
        
        
        Mail::send('emails.contact_data1', $data1, function($message)  use ($data1) {
     


        $message->to($data1['email'], 'it remote jobs')
        ->from('kvenkat615@gmail.com', 'it remote jobs')
        ->subject('Thank you for contacting us – we will get back to you soon!');


        });
        
        if (Mail::failures()) {

        }else{
            
        } 

			return response()->json(['success'=>'Thank you for contacting us – we will get back to you soon!']);
        }


    	return response()->json(['errors'=>$validator->errors()]);
    }
    </script>