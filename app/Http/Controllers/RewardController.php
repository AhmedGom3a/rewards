<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }

    public function show($id)
    {
        $reward = Reward::findOrFail($id);
        return view('rewards.show', compact('reward'));
    }

    public function create()
    {
        return view('rewards.create-reward');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $reward = new Reward();
        $reward->name = $request->name;
        $reward->description = $request->description;
        $reward->price = $request->price;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rewards', 'public');
            $reward->image = $path;
        }

        $reward->save();

        return redirect()->route('rewards.index')->with('success', 'Reward created successfully!');
    }

    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        return view('rewards.edit-reward', compact('reward'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $reward = Reward::findOrFail($id);
        $reward->name = $request->name;
        $reward->description = $request->description;
        $reward->price = $request->price;

        if ($request->hasFile('image')) {
            if ($reward->image) {
                Storage::disk('public')->delete($reward->image);
            }
            $path = $request->file('image')->store('rewards', 'public');
            $reward->image = $path;
        }

        $reward->save();

        return redirect()->route('rewards.index')->with('success', 'Reward updated successfully!');
    }

    public function destroy($id)
    {
        $reward = Reward::findOrFail($id);
        if ($reward->image) {
            Storage::disk('public')->delete($reward->image);
        }
        $reward->delete();

        return redirect()->route('rewards.index')->with('success', 'Reward deleted successfully!');
    }
}
