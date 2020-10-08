<?php

namespace App\Validators;

use App\Exceptions\BadRequest as BadRequestException;
use App\Repos\Resource as ResourceRepo;

class Resource extends Validator
{

    public function checkResource($id)
    {
        $resourceRepo = new ResourceRepo();

        $resource = $resourceRepo->findById($id);

        if (!$resource) {
            throw new BadRequestException('resource.not_found');
        }

        return $resource;
    }

    public function checkCourse($id)
    {
        $validator = new Course();

        return $validator->checkCourse($id);
    }

    public function checkChapter($id)
    {
        $validator = new Chapter();

        return $validator->checkChapter($id);
    }

    public function checkUpload($id)
    {
        $validator = new Upload();

        return $validator->checkUpload($id);
    }

}
