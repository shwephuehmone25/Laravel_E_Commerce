<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
     */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute သည် :min နှင့် :max အတွင်းရှိရပါမည်။',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => ':attribute သည် true သို့မဟုတ် false ဘဲဖြစ်ရပါမည်။',
    'confirmed' => ':attribute ကိုက်ညီမှုမရှိပါ။',
    'current_password' => 'လျို့ဝှက်နံပါတ်သည် မမှန်ကန်ပါ။',
    'date' => ':attribute သည် မှန်ကန်သော ရက်စွဲ ဖြစ်ရပါမည်။',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute သည် :format ဖောမတ်နှင့် မကိုက်ညီပါ။',
    'different' => 'The :attribute and :other must be different.',
    'email' => ':attribute သည်တရားဝင် အီးမေးလ် ဖြစ်ရပါမည်။',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => ':attribute မှားယွင်းနေပါသည်။',
    'file' => ':attribute သည် ဖိုင်အမျိုးအစားဖြစ်ရပါမည်။',
    'image' => ':attribute သည် ပုံ ဖြစ်ရပါမည်။',
    'max' => [
        'numeric' => ':attribute သည် :max ခုထက်မများရပါ။',
        'file' => ':attribute သည် :max kilobytes ထက်မများရပါ။',
        'string' => ':attribute သည် :max ခု အရေအတွက်ထက်မများရပါ။',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => ':attribute သည် :values file type ဖြစ်ရပါမည်။',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute သည် :min ထက် မငယ်ရပါ။',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attribute သည် အနည်းဆုံး :min လုံးရှိရပါမည်။',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'numeric' => ':attribute သည် ကိန်းဂဏန်းဖြစ်ရပါမည်။',
    'password' => 'လျို့ဝှက်နံပါတ် မှားယွင်းနေပါသည်။',
    'regex' => ':attribute ဖော်မတ်သည် မမှန်ကန်ပါ။.',
    'required' => ':attribute ဖြည့်ရန်လိုအပ်ပါသည်။',
    'same' => ':attribute နှင့် :other ကိုက်ညီရမည်။',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute သည် စာသား ဖြစ်ရမည်။',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => ':attribute သည် အသုံးပြုပြီးသားဖြစ်ပါသည်.',
    'uploaded' => ':attribute အပ်လုဒ်လုပ်ရန် မအောင်မြင်ပါ။',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
     */

    'attributes' => [
        'name' => 'အမည်',
        'email' => 'အီးမေးလ်',
        'password' => 'လျှို့ဝှက်နံပါတ်',
        'verify_code' => 'အတည်ပြုကုဒ်',
        'description' => 'အ‌ကြောင်း‌အရာ',
        'images' => 'ပုံများ',
        'old_password' => 'လျှို့ဝှက်နံပါတ်အဟောင်း',
        'new_password' => 'လျှို့ဝှက်နံပါတ်အသစ်',
        'confirm_password' => 'အတည်ပြု လျှို့ဝှက်နံပါတ်',
        'password_confirmation' => 'အတည်ပြုလျှို့ဝှက်နံပါတ်',
        'password' => 'လျှို့ဝှက်နံပါတ်',
        'image' => 'ပုံ',
        'message' => 'မက်စ်ဆေ့',
    ],

];