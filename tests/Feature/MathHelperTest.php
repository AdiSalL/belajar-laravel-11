<?php

use App\Helpers\MathHelper;

test('example', function () {
    $result1 = MathHelper::add(1, 2);
    $result2 = MathHelper::add(1, 2);
    
    expect($result1)->toBe(3);
    expect($result2)->toBe(3);
    
});
