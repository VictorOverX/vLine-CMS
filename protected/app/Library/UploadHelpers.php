<?php

namespace App\Library;
use Intervention\Image\ImageManagerStatic as Image;

class UploadHelpers {

    private $File;
    private $InputFile;
    private $Name;
    private $NomedoArquivo;
    private $Send;

    /** RESIZE * */
    private $Width;
    private $Heigth;
    private $Noty;
    private $extension;
    private static $extensionAceitas = ['jpg', 'jpeg', 'png'];

    /** DIRETÓTIOS */
    private $Folder;
    private static $BaseDir;

    const ERRO_UPLOAD   = 'Erro ao fazer upload do arquivo!';
    const ERRO_EXTENS   = 'Extensão não aceita!';
    const NOTY_SUCCESS  = 'Upload Feito com sucesso';

    /**
     * Verifica e cria o diretório padrão de uploads no sistema!<br>
     * <b>../uploads/</b>
     */
    function __construct($BaseDir = null) {
        self::$BaseDir = ( (string) $BaseDir ? $BaseDir : 'uploads/');
        if (!file_exists(self::$BaseDir) && !is_dir(self::$BaseDir)):
            mkdir(self::$BaseDir, 0777);
        endif;
    }

    public function ImageUpload($Image, $Width = null, $Heigth = null, $Folder = null) {
        $this->Width        = $Width;
        $this->Heigth       = $Heigth;

        $this->InputFile    = $Image;
        
        $this->Folder       = ( (string) $Folder ? $Folder : 'images' );
        $this->File         = Image::make($Image);

        $this->CheckFolder($this->Folder);
        if ($Width != null && $Heigth != null) {
            $this->ResizeImage($this->Width, $this->Heigth);
        }

        $this->setFileName();
        if ($this->UploadImage()) {
            return true;
        } else {
            return false;
        }
    }

    public function NomeArquivo() {
        return $this->NomedoArquivo;
    }
    
    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Verifica e cria os diretórios com base em tipo de arquivo, ano e mês!
    private function CheckFolder($Folder) {
        list($y, $m) = explode('/', date('Y/m'));
        $this->CreateFolder("{$Folder}");
        $this->CreateFolder("{$Folder}/{$y}");
        $this->CreateFolder("{$Folder}/{$y}/{$m}/");
        $this->Send = "{$Folder}/{$y}/{$m}/";
    }

    //Verifica e cria o diretório base!
    private function CreateFolder($Folder) {
        if (!file_exists(self::$BaseDir . $Folder) && !is_dir(self::$BaseDir . $Folder)):
            mkdir(self::$BaseDir . $Folder, 0777);
        endif;
    }

    private function ResizeImage() {
        $this->File->fit($this->Width, $this->Heigth);
    }

    //Verifica e monta o nome dos arquivos tratando a string!
    private function setFileName() {
        $FileName = md5(uniqid()) . '.' . $this->InputFile->getClientOriginalExtension();

        if (file_exists(self::$BaseDir . $this->Send . $FileName)):
            $FileName = $this->Name;
        endif;

        $this->Name = $FileName;
    }

    //Realiza o upload de imagens redimensionando a mesma!
    private function UploadImage() {
        if ($this->File->save(self::$BaseDir . $this->Send . $this->Name)) {
            $this->NomedoArquivo = $this->Send . $this->Name;
            return true;
        }
    }

}
