<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/22/18
 * Time: 9:00 PM
 */

    class Perfil_model extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function doInsertUpdt($pessoa, $photo)
        {

            $this->db->trans_begin();

            $idAddres = $this->doInsertUpdateAddress($pessoa);
            $this->doInsertUpdatePhoto($pessoa, $photo);
            $this->doInsertUpdateContact($pessoa);
            $this->doInsertUpdateTimeDefault($pessoa);
            $this->doInsertUpdateUser($pessoa);
            $this->doInsertUpdatePerson($pessoa, $idAddres);

            if ($this->db->trans_status() === FALSE)  {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        }

        public function doChangePassword($pessoa, $pass)
        {
            try {

                $senha =$this->encrypt->encode(SENHA_BEGIN.$pass.SENHA_END);
                $data = array(
                    'senha' => $senha,
                );

                $this->db->where('fkpessoa', $pessoa);
                $this->db->update('usuario', $data);

                return true;

            } catch (\Exception $e) {
                return false;
            }
        }

        private function doInsertUpdatePerson($pessoa, $endereco)
        {
            $data = array(
                'nome' => $this->input->post('nome'),
                'sobrenome' => $this->input->post('sobrenome'),
                'data_nascimento' => $this->input->post('dataNascimento'),
                'fkendereco' => $endereco,
                'fkprofissao' => $this->doSelectIdProfession($this->input->post('profissao')),
                'fkempresa' => $this->doSelectIdCompany($this->input->post('empresa'))
            );

            $this->db->where('id', $pessoa);
            $this->db->update('pessoa', $data);
        }

        private function doInsertUpdateAddress($pessoa)
        {
            $idAddres = $this->doSelectAddress($pessoa);
            if ($idAddres == 0)
            {
                $data = array(
                    'cep' => $this->input->post('cep'),
                    'endereco' => $this->input->post('endereco'),
                    'fkcidade' => $this->doSelectIdCity($this->input->post('cidade')),
                    'bairro' => $this->input->post('bairro'),
                    'numero' => $this->input->post('numero'),
                    'complemento' => $this->input->post('complemento')
                );

                $this->db->insert('endereco', $data);
                $id = $this->db->insert_id();
                return $id;
            } else {
                $data = array(
                    'cep' => $this->input->post('cep'),
                    'endereco' => $this->input->post('endereco'),
                    'fkcidade' => $this->doSelectIdCity($this->input->post('cidade')),
                    'bairro' => $this->input->post('bairro'),
                    'numero' => $this->input->post('numero'),
                    'complemento' => $this->input->post('complemento')
                );

                $this->db->where('id', $idAddres);
                $this->db->update('endereco', $data); //$this->db->set('column_header', $value); $this->db->where('column_id', $column_id_value); $this->db->update('table_name');
                return $idAddres;
            }
        }

        private function doInsertUpdatePhoto($pessoa, $photo)
        {
            if ($photo != 'data:image/;base64,') {
                $idFoto = $this->doSelectIdPhoto($pessoa);
                if ($idFoto == 0) {
                    $data = array(
                        'foto' =>  $photo,
                        'fkpessoa' => $pessoa
                    );

                    $this->db->insert('foto_perfil', $data);
                } else {
                    $data = array(
                        'foto' => $photo
                    );

                    $this->db->where('fkpessoa', $pessoa);
                    $this->db->update('foto_perfil', $data);
                }
            }
        }

        private function doInsertUpdateContact($pessoa)
        {
            $dddCel   = $this->doGetDDD($this->input->post('celular'));
            $dddTel   = $this->doGetDDD($this->input->post('telefone'));
            $celular  = $this->doGetNumber($this->input->post('celular'));
            $telefone = $this->doGetNumber($this->input->post('telefone'));
            $idCont   = $this->doSelectIdContact($pessoa);

            if ($idCont == 0) {

                $data = array(
                    'ddd_celular' => $dddCel,
                    'ddd_telefone' => $dddTel,
                    'celular' => $celular,
                    'telefone' =>  $telefone,
                    'fkpessoa' => $pessoa
                );

                $this->db->insert('contato', $data);
            } else {

                $data = array(
                    'ddd_celular' => $dddCel,
                    'ddd_telefone' => $dddTel,
                    'celular' =>  $celular,
                    'telefone' => $telefone
                );

                $this->db->where('fkpessoa', $pessoa);
                $this->db->update('contato', $data);
            }

        }

        private function doInsertUpdateTimeDefault($pessoa)
        {

            $idFoto = $this->doSelectIdTimeDefault($pessoa);
            if ($idFoto == 0) {
                if ($this->input->post('almoco') == 'Sim' )
                {
                    $data = array(
                        'horario_inicial' => $this->input->post('horario-inicial'),
                        'horario_final' => $this->input->post('horario-final'),
                        'horario_almoco' => $this->input->post('horario-almoco'),
                        'possui_horario_almoco' => $this->doConvertTiny($this->input->post('almoco')),
                        'sabado' => $this->doConvertTiny($this->input->post('sabado')),
                        'domingo' => $this->doConvertTiny($this->input->post('domingo')),
                        'fkpessoa' => $pessoa
                    );
                } else {
                    $data = array(
                        'horario_inicial' => $this->input->post('horario-inicial'),
                        'horario_final' => $this->input->post('horario-final'),
                        'horario_almoco' => '00:00:00',
                        'possui_horario_almoco' => $this->doConvertTiny($this->input->post('almoco')),
                        'sabado' => $this->doConvertTiny($this->input->post('sabado')),
                        'domingo' => $this->doConvertTiny($this->input->post('domingo')),
                        'fkpessoa' => $pessoa
                    );
                }

                $this->db->insert('horario_padrao', $data);
            } else {
                if ($this->input->post('almoco') == 'Sim' ) {
                    $data = array(
                        'horario_inicial' => $this->input->post('horario-inicial'),
                        'horario_final' => $this->input->post('horario-final'),
                        'horario_almoco' => $this->input->post('horario-almoco'),
                        'possui_horario_almoco' => $this->doConvertTiny($this->input->post('almoco')),
                        'sabado' => $this->doConvertTiny($this->input->post('sabado')),
                        'domingo' => $this->doConvertTiny($this->input->post('domingo'))
                    );
                } else {
                    $data = array(
                        'horario_inicial' => $this->input->post('horario-inicial'),
                        'horario_final' => $this->input->post('horario-final'),
                        'horario_almoco' => '00:00:00',
                        'possui_horario_almoco' => $this->doConvertTiny($this->input->post('almoco')),
                        'sabado' => $this->doConvertTiny($this->input->post('sabado')),
                        'domingo' => $this->doConvertTiny($this->input->post('domingo'))
                    );
                }

                $this->db->where('fkpessoa', $pessoa);
                $this->db->update('horario_padrao', $data);
            }
        }

        private function doInsertUpdateUser($pessoa)
        {
            $data = array(
                'email' => $this->input->post('email'),
                'usuario' => $this->input->post('usuario')
            );

            $this->db->where('fkpessoa', $pessoa);
            $this->db->update('usuario', $data);

        }

        public function doValidateUser($usuario)
        {
            $this->db->select('id')
                ->from('usuario')
                ->where('usuario', $usuario);

            $query = $this->db->get();
            $user = $query->row();

            if ($user == null) {
                return 'Não existe ainda!';
            } else {
                return 'Já existe!';
            }
        }

        public function doValidateUserForPerson($usuario, $pessoa)
        {
            $arrayWhere = array('usuario' => $usuario, 'fkpessoa' => $pessoa);
            $this->db->select('id')
                ->from('usuario')
                ->where($arrayWhere);

            $query = $this->db->get();
            $user = $query->row();

            if ($user == null) {
                return 'Não existe ainda!';
            } else {
                return 'Já existe!';
            }
        }


        //Select Abaixo-------------------------------------------------------------------------------------------------

        private function doSelectAddress($pessoa)
        {
            $this->db->select('fkendereco')
                     ->from('pessoa')
                     ->where('id', $pessoa);

            $query = $this->db->get();
            $endereco = $query->row();

            if ($endereco == null) {
                return 0;
            } else {
                return $endereco->fkendereco;
            }
        }

        public function doSelectIdCity($cidade)
        {
            $aspCid = str_replace("'","",$cidade);

            $this->db->select('id')
                     ->from('cidades')
                     ->where('cidade', $aspCid);

//            $sql = $this->db->last_query();
//            mDebug($sql);

            $query  = $this->db->get();
            $cid = $query->row();
            $getCid = $cid->id;
            return $getCid;
        }

        private function doSelectIdProfession($profession)
        {
            $this->db->select('id')
                ->from('profissao')
                ->where('profissao', $profession);

            $query  = $this->db->get();
            $profissao = $query->row();

            if ($profissao == null) {

                $data = array(
                    'profissao' => $this->input->post('profissao')
                );

                $this->db->insert('profissao', $data);
                $id = $this->db->insert_id();
                return $id;
            } else {
                return $profissao->id;
            }
        }

        private function doSelectIdContact($pessoa)
        {
            $this->db->select('id')
                ->from('contato')
                ->where('fkpessoa', $pessoa);

            $query   = $this->db->get();
            $contato  = $query->row();
            if ($contato  == null) {
                return 0;
            } else {
                return $contato ->id;
            }
        }

        private function doSelectIdPhoto($pessoa)
        {
            $this->db->select('id')
                ->from('foto_perfil')
                ->where('fkpessoa', $pessoa);

            $query  = $this->db->get();
            $foto  = $query->row();
            if ($foto  == null) {
                return 0;
            } else {
                return $foto ->id;
            }
        }

        private function doSelectIdTimeDefault($pessoa)
        {
            $this->db->select('id')
                ->from('horario_padrao')
                ->where('fkpessoa', $pessoa);

            $query = $this->db->get();
            $time  = $query->row();
            if ($time == null) {
                return 0;
            } else {
                return $time ->id;
            }
        }

        public function doSelectIdCompany($company)
        {
            $aspComp = str_replace("'","",$company);

            $this->db->select('id')
                ->from('empresa')
                ->where('nome_fantasia', $aspComp);

            $query  = $this->db->get();
            $comp = $query->row();
            $getComp = $comp->id;
            return $getComp;
        }

        private function doGetDDD($numero)
        {
            if (!empty($numero)) {
                $ddd = preg_replace('/[^A-Za-z0-9-]/', '', $numero);
                $num = substr($ddd, 0, 2);
                return $num;
            } else {
                return '';
            }
        }

        private function doGetNumber($numero)
        {
            if (!empty($numero)) {
                $num = preg_replace('/[^A-Za-z0-9-]/', '', $numero);
                $size = strlen($num);
                $numFormat = substr($num, 2, $size);
                return $numFormat;
            } else {
                return '';
            }
        }

        private function doConvertTiny($noTiny)
        {
            if ($noTiny == 'Sim') {
                $converte = 1;
            } else {
                $converte = 0;
            }

            return $converte;
        }

    }