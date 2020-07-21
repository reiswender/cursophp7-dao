<?php

    class Usuario {

        // Atributos
        private $id_usuario;
        private $desc_login;
        private $desc_senha;
        private $dt_cadastro;

        // Getters e Setters
        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function setIdUsuario($idUsuario) {
            $this->id_usuario = $idUsuario;
        }

        public function getDescLogin() {
            return $this->desc_login;
        }

        public function setDescLogin($descLogin) {
            $this->desc_login = $descLogin;
        }

        public function getDescSenha() {
            return $this->desc_senha;
        }

        public function setDescSenha($descSenha) {
            $this->desc_senha = $descSenha;
        }

        public function getDtCadastro() {
            return $this->dt_cadastro;
        }

        public function setDtCadastro($dtCadastro) {
            $this->dt_cadastro = $dtCadastro;
        }

        // Métodos
        public function loadById($id) {

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
                ":ID"=>$id
            ));

            if (count($results) > 0) {

                $row = $results[0];

                $this->setIdUsuario($row["id_usuario"]);
                $this->setDescLogin($row["desc_login"]);
                $this->setDescSenha($row["desc_senha"]);
                $this->setDtCadastro(new DateTime($row["dt_cadastro"]));

            }

        }

        public function __toString() {
            
            return json_encode(array(

                "id_usuario"=>$this->getIdUsuario(),
                "des_login"=>$this->getDescLogin(),
                "des_senha"=>$this->getDescSenha(),
                "dt_cadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")

            ));

        }

    }