<?php

namespace Database\Seeders;

use App\Filament\Models\Teacher;
use Course\Infrastructure\Models\Subject;
use Course\Infrastructure\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \Student\Infrastructure\Models\Student::factory()->create([
            'name' => 'Przemo',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret12345')
        ]);

        Teacher::factory()->create([
            'name' => 'Przemo',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret12345')
        ]);

        $subject = Subject::factory()->create();

        $words = [
            'because' => 'ponieważ',
            'although' => 'chociaż',
            'while' => 'podczas gdy',
            'since' => 'ponieważ',
            'however' => 'jednakże',
            'therefore' => 'dlatego',
            'meanwhile' => 'tymczasem',
            'moreover' => 'ponadto',
            'thus' => 'tak więc',
            'nevertheless' => 'niemniej jednak',
            'furthermore' => 'ponadto',
            'consequently' => 'w konsekwencji',
            'unless' => 'chyba że',
            'whereas' => 'podczas gdy',
            'provided' => 'pod warunkiem',
            'otherwise' => 'w przeciwnym razie',
        ];

        foreach ($words as $word => $translation) {
            $word = Word::factory()->create([
                'word' => $word,
                'translation' => $translation,
            ]);
            $subject->words()->attach($word);
        }
    }
}
