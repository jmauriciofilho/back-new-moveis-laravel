<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 09/02/17
 * Time: 11:22
 */

namespace App\Domain\Justifications;

use Illuminate\Http\Request;

class JustificationsService
{
    private $justifications;

    function __construct(Justifications $justifications)
    {
        $this->justifications = $justifications;
    }

    public function store(Request $request)
    {
        return $this->justifications->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->justifications->update($request->all());
    }
}