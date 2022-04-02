<?php

return [

    'sidemenu' => [
        'dashboard' => 'Панель',
        'general' => [
            'title' => 'Загальні',
            'refugees' => [
                'title' => 'Біженці',
                'list' => 'Список',
                'search' => 'пошук',
                'add' => 'Додати',
            ],
        ],
        'other' => [
            'title' => 'Інший',
            'settings' => 'Налаштування',
            'help' => 'Центр допомоги',
            'schedule' => 'Графік чергування',
        ],
    ],
    'topmenu' => [
        'search' => 'Пошук біженця',
        'profile' => 'Профіль',
    ],
    'dashboard' => [
        'title' => 'Sklep Półki dobra | Магазин Полиці добра',
        'todayvisit' => 'Сьогоднішня кількість відвідувань',
        'refugeescount' => 'Кількість зареєстрованих біженців',
        'visitscount' => 'Кількість повторних відвідувань',
        'todaycount' => 'Сьогоднішня кількість реєстрацій',
        'stat' => 'Відносно вчорашнього дня',
        'stats' => [
            'title' => 'Статистика реєстрацій та повторних відвідувань (за останні 7 днів)',
            'button' => 'Список біженців',
            'sign' => 'Кількість нових реєстрацій',
            'visit' => 'Кількість повторних відвідувань',
        ],
        'help' => 'Допоможіть',
        'helptext' => 'Якщо у вас є проблема, пропозиція чи запитання, не соромтеся писати на адресу:',
    ],

    'settings' => [
        'title' => 'Зміна пароля',
        'oldpwd' => 'старий пароль',
        'newpwd' => 'Новий пароль',
        'repeatnewpwd' => 'Повторити новий пароль',
        'button' => 'Змінити пароль',
        'alert' => 'Зміна пароля була успішна!',
    ],

    'profile' => [
        'title' => 'Профіль користувача',
        'username' => 'Username',
        'email' => 'Адреса електронної пошти',
        'firstname' => 'Name',
        'lastname' => 'Прізвище',
        'telephone' => 'Номер телефону',
        'button' => 'Зберегти зміни',
        'alert' => 'Дані користувача успішно відредаговані!',
        'divchecktitle' => 'Налаштування без збереження (збереження автоматично)',
        'check1' => 'Перегляд цифрових даних під час створення біженців',
        'check2' => 'Показати запитання - поради щодо створення біженців',
        'check3' => 'Відразу відобразити вікно відвідування після відображення 1 запису',
    ],

    'help' => [
        'title' => 'Довідка',
         'message' => 'Натисніть на вибрану статтю, щоб переглянути деталі',
         'article' => 'Окрема стаття',
        '1' => [
            'title' => 'Як додати нового біженця?',
            '11' => 'Виберіть опцію біженця з бічного меню',
            '12' => 'Додати',
            '21' => 'Ви заповнюєте опитування відповідно до інструкцій:',
            '22' => 'Якщо біженець зареєструвався в 28-му окрузі: '."ім'я".', прізвище, дата народження, відомості про дітей, у поле для коментарів напишіть: «info w 28 dzielnicy»,',
            '23' => "Якщо біженець НЕ зареєстрований у 28-му окрузі: ім’я, прізвище, дата народження, номер телефону, поточна адреса, інформація про роботу, інформація про бажання залишитися, інформація про дітей.",
            '31' => 'Якщо у біженця є польський документ, що посвідчує особу з електронним шаром (RFID), запитайте його та дотримуйтесь інструкцій у вкладці',
            '41' => 'Ви натискаєте кнопку «Створити», щоб додати біженця до системи.',
            '42' => 'Увага! Вам не потрібно додавати відвідування окремо – перше відвідування додається автоматично.',
            '51' => 'Дайте карту Рибника та ваучер на продукти харчування та хімію.',
        ],
        '2' => [
            'title' => 'Як шукати біженця?',
            '11' => 'Запит на документ, що посвідчує особу (паспорт, посвідчення особи, Дія),',
            '21' => 'Шукати можна двома способами:',
            '22' => 'Виберіть Біженці з бічного меню',
            '23' => 'І ви шукаєте дані',
            '24' => 'Безпосередньо з верхнього меню з рядка пошуку',
            '31' => "знайдіть певну фразу, і результати пошуку з’являться",
            '41' => 'Ви можете шукати біженця за такими даними:',
            '42' => 'Цифрові дані',
            '51' => 'Пояснення значків у параметрах:',
            '52' => 'Переглянути всі дані про біженців',
            '53' => '',
        ],
        '3' => [
            'title' => 'Як редагувати дані біженця?',
             '11' => 'або знайти його в списку біженців',
             '21' => 'Натисніть на піктограму',
             '22' => 'в параметрах',
             '31' => 'Відредагуйте дані та натисніть "Зберегти"',
        ],
        '4' => [
            'title' => 'Як додати відвідування?',
             '11' => 'Виберіть причини свого візиту (за замовчуванням вибрано варіант одягу) і натисніть кнопку «Надіслати»',
        ],
        '5' => [
            'title' => 'Як додати цифрові дані про біженців?',
             '11' => 'Виберіть відповідну опцію та введіть дані за допомогою сканера QR-коду або пристрою зчитування RFID-карт',
             '21' => 'Щоб зберегти дані, натисніть кнопку «Зберегти».',
        ],
        '6' => [
            'title' => 'Як користуватися зчитувачем RFID-карт?',
        ],
    ],

    'refugees' => [
        'list' => [
            'title' => 'Список біженців',
            'list' => 'Список',
            'name' => "Ім'я та прізвище",
            'visits' => 'Кількість відвідувань',
            'lastvisit' => 'Останнє відвідування - потреби',
            'birthdate' => 'Дата народження',
            'kids' => 'Діти',
            'novisits' => 'Без відвідувань!',
            'norefugees' => 'Біженців немає!',
            'food' => 'Їжа',
            'detergents' => 'Хімічні',
            'clothes' => 'Одяг',
            'button' => 'Створити список',
        ],
        'create' => [
            'title' => 'Додати біженця',
            'question' => 'Чи зареєстровані вони в 28 районі (28 dzielnica)?',
            'checkbox' => 'Відображати цифрові дані',
             'lastname' => 'Прізвище',
             'firstname' => "Ім'я",
             'birth' => 'Дата народження',
             'telephone' => 'Номер телефону',
             'gender' => [
                 'title' => 'Стать',
                 'f' => 'Жінка',
                 'm' => 'чоловік',
             ],
            'address' => 'Адреса перебування в Польщі (номер вулиці, місто)',
            'work' => 'Виконана робота',
            'stay' => [
                'title' => 'Бажання залишитися в Польщі',
                'yes' => 'Так',
                'no' => 'Ні',
                'maybe' => 'Можливо',
                'tdk' => 'Не знає',
            ],
            'kids' => 'Інформація про дітей',
            'remarks' => 'Зауваження',
            'button' => 'Створити',
            'alert' => 'Біженець успішно доданий!',
        ],
        'edit' => [
            'title' => 'Редагувати відомості про біженця',
             'edit' => 'Редагувати',
             'alert' => 'Інформація про біженців успішно відредагована!',
        ],
        'show' => [
            'editbutton' => "Редагувати дані біженця",
            'visitbutton' => 'Додати відвідування',
            'history' => 'Історія відвідувань',
            'title' => 'Інформація про біженця',
            'deletebnutton' => 'Видалити біженця',
        ],
        'alert' => [
            'visit' => 'Відвідування успішно додано!',
             'data' => 'Зміна цифрових даних успішна!',
        ],
        'repeating' => [
            'modalvisit' => [
                'reason' => 'Причина візиту',
                'shopvisits' => 'Усі відвідування магазину',
            ],
            'modaldata' => [
                'title' => 'Редагувати цифрові дані біженців',
            ],
        ],
    ],
];
