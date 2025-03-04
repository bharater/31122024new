<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    // Method to show the edit form with the current settings data
    public function edit()
    {
        $appSetting = AppSetting::first();  // Fetch the first settings from the database
        return view('admin.forms.index', compact('appSetting'));  // Pass data to the view
    }

    // Method to update the settings
    public function update(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'mission_title' => 'required|string',
            'mission_description' => 'required|string',
            'mission_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'vision_title' => 'required|string',
            'vision_description' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'values_title' => 'required|string',
            'values_description' => 'required|string',
            'values_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'project_6_title' => 'required|string',
            'project_6_description' => 'required|string',
            'project_6_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'project_7_title' => 'required|string',
            'project_7_description' => 'required|string',
            'project_7_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'project_8_title' => 'required|string',
            'project_8_description' => 'required|string',
            'project_8_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update the app settings
        $appSetting = AppSetting::first();

        // Handle image uploads using the helper method
        $this->handleImageUpload($request, 'mission_image', $appSetting, 'mission_image', 'uploads/mission');
        $this->handleImageUpload($request, 'vision_image', $appSetting, 'vision_image', 'uploads/vision');
        $this->handleImageUpload($request, 'values_image', $appSetting, 'values_image', 'uploads/values');
        $this->handleImageUpload($request, 'project_6_image', $appSetting, 'project_6_image', 'uploads/projects');
        $this->handleImageUpload($request, 'project_7_image', $appSetting, 'project_7_image', 'uploads/projects');
        $this->handleImageUpload($request, 'project_8_image', $appSetting, 'project_8_image', 'uploads/projects');

        // Save the other fields
        $appSetting->mission_title = $validated['mission_title'];
        $appSetting->mission_description = $validated['mission_description'];
        $appSetting->vision_title = $validated['vision_title'];
        $appSetting->vision_description = $validated['vision_description'];
        $appSetting->values_title = $validated['values_title'];
        $appSetting->values_description = $validated['values_description'];
        $appSetting->project_6_title = $validated['project_6_title'];
        $appSetting->project_6_description = $validated['project_6_description'];
        $appSetting->project_7_title = $validated['project_7_title'];
        $appSetting->project_7_description = $validated['project_7_description'];
        $appSetting->project_8_title = $validated['project_8_title'];
        $appSetting->project_8_description = $validated['project_8_description'];

        // Save changes to the database
        $appSetting->save();

        return redirect()->back()->with('message', 'Settings updated successfully!');
    }

    // Helper method to handle image upload
    // Helper method to handle image upload
private function handleImageUpload(Request $request, $inputName, AppSetting $appSetting, $appSettingField, $uploadPath)
{
    if ($request->hasFile($inputName)) {
        // Delete old image if exists
        if ($appSetting->$appSettingField) {
            $oldImagePath = public_path($uploadPath . '/' . $appSetting->$appSettingField);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete old image
            }
        }

        // Handle the new image upload
        $file = $request->file($inputName);
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($uploadPath), $filename);
        $appSetting->$appSettingField = $filename; // Store only the filename
    }
}

}
