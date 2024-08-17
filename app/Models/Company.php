<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'logo_path', 'link'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public static function getCompanyNames() : Collection{
        return Company::select(['id', 'name'])->orderBy('created_at', 'desc')->get();
    }

    public function updateCompany($request) : void{
        if ($request->hasFile('logo')){
            if ($this->logo_path) {
                Storage::disk('public')->delete($this->logo_path);
            }

            $this->logo_path = $request->file('logo')->store('company', 'public');
        }

        $this->fill([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'link' => $request->validated('website')
        ]);
        $this->save();
    }
}
