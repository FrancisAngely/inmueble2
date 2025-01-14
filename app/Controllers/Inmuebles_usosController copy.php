    <?php
    namespace App\Controllers;
    
    use CodeIgniter\Controller;
    use App\Models\Inmueble_usoModel;
    use App\Models\InmuebleModel;
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    class Inmuebles_usosController extends BaseController
    {

        protected $helpers = ['form', 'comprobar'];
        public function index()
        {
            $model = new Inmueble_usoModel();
            $data['datos'] = $model->findAll();

            return view('inmuebles_usosListView', $data);
        }

        public function nuevo()
        {

            $options = array();
            $options[''] = "--Select--";

            $modelRole = new RoleModel();
            $roles = $modelRole->findAll();
            foreach ($roles as $role) {
                $options[$role["id"]] = $role["role"];
            }
            $data["optionsRoles"] = $options;

            return view('usuariosNewView', $data);
        }


        public function crear()
        {



            $rules = [
                'usuario' => [
                    'rules' => 'required|is_unique[usuarios.usuario]',
                    'errors' => [
                        'required' => 'Debes introducir un usuario',
                        'is_unique' => 'El nombre del usuario ya existe',
                    ]
                ],
                'id_roles' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Debes seleccionar un role',
                    ]
                ],
                'password' => [
                    'password' => 'required',
                    'errors' => [
                        'required' => 'Debes introducir una contraseña',
                    ]
                ],
            ];

            $datos = $this->request->getPost(array_keys($rules));

            if (!$this->validateData($datos, $rules)) {
                return redirect()->back()->withInput();
            }
            //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
            $model = new UsuarioModel();
            $id_roles = $this->request->getvar('id_roles');
            $usuario = $this->request->getvar('usuario');
            $password = $this->request->getvar('password');
            $email = $this->request->getvar('email');

            $newData = [
                'id_roles' => $id_roles,
                'usuario' => $usuario,
                'password' => $password,
                'email' => $email,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ];

            $model->save($newData);


            return redirect()->to('/usuarios');
        }

        public function editar()
        {
            $model = new UsuarioModel();
            $id = $this->request->getvar('id');
            $data["datos"] = $model->where('id', $id)->first();

            $options = array();
            $options[''] = "--Select--";

            $modelRole = new RoleModel();
            $roles = $modelRole->findAll();
            foreach ($roles as $role) {
                $options[$role["id"]] = $role["role"];
            }
            $data["optionsRoles"] = $options;

            return view('usuariosEditView', $data);
        }

        public function actualizar()
        {

            $rules = [
                'usuario' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Debes introducir un usuario',
                        'is_unique' => 'El nombre del usuario ya existe',
                    ]
                ],
                'id_roles' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Debes seleccionar un role',
                    ]
                ],
                'password' => [
                    'password' => 'required',
                    'errors' => [
                        'required' => 'Debes introducir una contraseña',
                    ]
                ],
            ];

            $datos = $this->request->getPost(array_keys($rules));

            if (!$this->validateData($datos, $rules)) {
                return redirect()->back()->withInput();
            }

            $model = new UsuarioModel();
            $id = $this->request->getvar('id');
            $id_roles = $this->request->getvar('id_roles');
            $usuario = $this->request->getvar('usuario');
            $password = $this->request->getvar('password');
            $email = $this->request->getvar('email');
            $model->where('id', $id)
                ->set(['id_roles' => $id_roles, 'usuario' => $usuario, 'password' => $password, 'email' => $email, 'updated_at' => date("Y-m-d h:i:s")])
                ->update();


            return redirect()->to('/usuarios');
        }


        public function delete()
        {
            $model = new RoleModel();
            $id = $this->request->getvar('id');

            $model->where('id', $id)->delete();
            return redirect()->to('/roles');
        }

        public function exportar()
        {
            $model = new UsuarioModel();
            $usuarios = $model->findAll();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Role');
            $sheet->setCellValue('B1', 'usuario');
            $sheet->setCellValue('C1', 'password');
            $sheet->setCellValue('D1', 'email');
            $coun = 2;
            foreach ($usuarios as $usuario) {
                $sheet->setCellValue('A' . $coun, $usuario["role"]);
                $sheet->setCellValue('B' . $coun, $usuario["usuario"]);
                $sheet->setCellValue('C' . $coun, $usuario["password"]);
                $sheet->setCellValue('D' . $coun, $usuario["email"]);
                $coun++;
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save('Usuarios.xlsx');

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition:attachment; filename=hello world.xlsx");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate");
            header("Content-Length: " . filesize("hello world.xlsx"));
            flush();
            readfile("hello world.xlsx");
            exit;
        }
    }


    ?>