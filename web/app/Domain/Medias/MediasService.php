<?php

namespace App\Domain\Medias;

use App\Domain\_Classes\AbstractService;
use Illuminate\Http\UploadedFile;

class MediasService extends AbstractService
{
    private $pathTemp = 'uploads/temp';

    public function __construct()
    {
        parent::__construct(Media::class);
    }

    public function upload(UploadedFile $file, $path = null, $name = null)
    {
        $path = is_null($path) ? $this->pathTemp : $path;
        $name = is_null($name) ? $this->getHash(20) : $name;

        //$file->move();
    }

    public function getHash($length = 10)
    {
        return str_slug(substr(str_random(uniqid()), 1, $length));
    }

    public function destroy($listIdOrId)
    {
        if (is_array($listIdOrId)) {
            $result = [];
            foreach ($listIdOrId as $id) {
                array_push($result, $this->destroy($id));
            }
            return $result;
        } else {
            $media = $this->find($listIdOrId);
            if ($media) {
                unlink(public_path() . $media->path);
            }
            return parent::destroy($listIdOrId);
        }
    }
}