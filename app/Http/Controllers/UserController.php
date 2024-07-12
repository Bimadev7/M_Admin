<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

    

    class UserController extends Controller
    {


        public function index(Request $request) {


            if ($request->ajax()) {

                $data = User::query();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('backoffice.user.index');
        }

        public function showRegistrationForm()
        {
            return view('auth.register');
        }

        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('backoffice.user.edit')->with(compact('user'));
        }

        public function update(Request $request, $id)
        {
            // Validasi input
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed',
                'role' => 'required|string|max:255',
            ]);

            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Update data pengguna
            $user->username = strip_tags(ucfirst($request->username));
            $user->email = strip_tags($request->email);
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->role = strip_tags($request->role);
            $user->save();

            // Redirect dengan pesan sukses
            return redirect()->route('backoffice.user.index')->with([
                'alert-type' => 'success',
                'message' => 'Data User Berhasil Diperbarui!'
            ]);
        }


        // UserController.php

        public function register(Request $request)
        {
            $validatedData = $request->validate([
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            // Hash password
            $validatedData['password'] = bcrypt($request->password);

            $user = User::create($validatedData);

            return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        }



        
        
        public function datatable(Request $request)
        {
                if ($request->ajax()) {

                $data = User::query();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            
            return view('backoffice.user.index');

        }






        public function create()
        {
            return view('backoffice.user.create');
        }









        public function store(Request $request)
        {

            $data = new User;
            $data->username = strip_tags(ucfirst($request->username));
            $data->email = strip_tags($request->email);
            $data->password = Hash::make($request->password);
            
            // Menggunakan strip_tags untuk membersihkan inputan role dari tag HTML
            $data->role = strip_tags($request->role);
            
            // Set default role jika $data->role kosong atau tidak ada inputan
            if (empty($data->role)) {
                $data->role = 'admin'; // Atur nilai default role di sini
            }
            
            $data->save();
            
            return redirect()->route('backoffice.user.index')->with([
                'alert-type' => 'success',
                'message' => 'Data User Berhasil Ditambahkan!'
            ]);
            
            

            }


        

            public function destroy($id)
            {
                
            try {
                $user = User::findOrFail($id);
                $user->delete();

                return response()->json(['message' => 'User berhasil dihapus.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal menghapus user. ' . $e->getMessage()], 500);
            }
        }

    
        
        public function show($id)
        {
            $user = User::findOrFail($id);
            return view('backoffice.user.show')->with(compact('user'));
        }
    }




















    