<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PictureRequest $request, Picture $picture): RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Picture $picture): RedirectResponse
    {
        $picture->delete();

        return back()->with('status', [
            'message'   => __('Deleted Successfully !'),
            'type'      => MessageType::DANGER->value,
        ]);
    }
}
