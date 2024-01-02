<?php

$domains = [
    'User',
    'Auth'
];

test('Dd and dump not be used')
    ->expect(['dd', 'dump'])
    ->not
    ->toBeUsed();

test('Value objects should be final', function() use ($domains) {
    expect("Shared\Utils\ValueObjects")
        ->toBeFinal();
});

test('Use cases should be final', function() use ($domains) {
    foreach ($domains as $domain) {
        expect("{$domain}\Application\UseCases")
            ->toBeFinal();
    }
});

test('Laravel facades not to be used in domain', function() use ($domains) {
    foreach ($domains as $domain) {
        expect("Illuminate\Support\Facades")
            ->not
            ->toBeUsedIn($domain);
    }
});

test('Domain classes should not be used in other domains', function() use ($domains) {

    foreach ($domains as $domain) {
        $other_domains = array_filter($domains, fn($d) => $d !== $domain);

        expect("{$domain}")
            ->not
            ->toBeUsedIn($other_domains);
    }
});

test('Infrastructure not to be used in domain, presentation and application layer', function() use ($domains) {

    foreach ($domains as $domain) {
        expect("{$domain}\Infrastructure")
            ->not
            ->toBeUsedIn([
                "{$domain}\Domain",
                "{$domain}\Presentation",
                "{$domain}\Application"
            ]);
    }
});

test('Domain not to be used in presentation layer', function() use ($domains) {

    foreach ($domains as $domain) {
        expect("{$domain}\Infrastructure")
            ->not
            ->toBeUsedIn([
                "{$domain}\Presentation",
            ]);
    }
});
