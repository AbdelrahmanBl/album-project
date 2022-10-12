<?php

namespace App\Http\Controllers;

use App\Enums\MessageType;
use App\Http\Requests\PictureRequest;
use App\Models\Picture;

class PictureController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PictureRequest  $request
     * @param  \App\Models\Picture                $picture
     * @return \Illuminate\Http\Response
     */
    public function update(PictureRequest $request, Picture $picture)
    {
        $picture->update($request->validated());

        return back()->with('status', [
            'message'   => __('Updated Successfully !'),
            'type'      => MessageType::SUCCESS->value,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();

        return back()->with('status', [
            'message'   => __('Deleted Successfully !'),
            'type'      => MessageType::DANGER->value,
        ]);
    }
}
