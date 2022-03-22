<?php

return [

    'sidemenu' => [
        'dashboard' => 'Dashboard',
        'general' => [
            'title' => 'General',
            'refugees' => [
                'title' => 'Refugees',
                'list' => 'List',
                'search' => 'Search',
                'add' => 'Add',
            ],
        ],
        'other' => [
            'title' => 'Other',
            'settings' => 'Settings',
            'help' => 'Help centre',
            'schedule' => 'Grafik dyżurów',
        ],
    ],
    'topmenu' => [
        'search' => 'Search refugee',
        'profile' => 'Profile',
    ],
    'dashboard' => [
        'title' => 'Shop Półki dobra | Полиці добра',
        'todayvisit' => "Today's number of visits",
        'refugeescount' => 'Number of registered refugees',
        'visitscount' => 'Number of re-visits',
        'todaycount' => "Today's number registered",
        'stat' => 'Relative to yesterday',
        'stats' => [
            'title' => 'Registrations and re-visits statistics (Last 7 days)',
            'button' => 'Refugees list',
            'sign' => 'Number of new registrations',
            'visit' => 'Number of re-visits',
        ],
        'help' => 'Help',
        'helptext' => 'If you have a problem, proposal or question, feel free to write to:',
    ],

    'settings' => [
        'title' => 'Changing password',
        'oldpwd' => 'Old password',
        'newpwd' => 'New password',
        'repeatnewpwd' => 'Repeat new password',
        'button' => 'Change password',
        'alert' => 'The password change was successful!',
    ],

    'profile' => [
        'title' => 'User profile',
        'username' => 'Username',
        'email' => 'Email address',
        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'telephone' => 'Telephone number',
        'button' => 'save Changes',
        'alert' => 'You have successfully edited your user data!',
    ],

    'help' => [
        'title' => 'Help',
        'message' => 'Click on the selected chapter to see details',
        'article' => 'Separate article',
        '1' => [
            'title' => 'How to add a new refugee?',
            '11' => 'Select from the side menu option Refugees',
            '12' => 'add',
            '21' => 'You complete the survey in accordance with the guidelines:',
            '22' => 'If the refugee has registered in the 28th district: Name, surname, date of birth, information about the children, write: "info w 28 dzielnicy" in the remarks field,',
            '23' => 'If the refugee has NOT registered in the 28th district: Name, surname, date of birth, telephone number, current address, information about work, information about the will to stay, information about children.',
            '31' => 'If the refugee has a Polish identity document with an electronic layer (RFID), ask for it and follow the guidelines in the article',
            '41' => 'You click the "Add" button to add a refugee to the system.',
            '42' => "Attention! You don't need to add a visit separately - the first visit is added automatically.",
            '51' => 'Give the map of Rybnik and a voucher for food and detergents.',
        ],
        '2' => [
            'title' => 'How to search for a refugee?',
            '11' => 'Request an identity document (Passport, ID, Diia (Дія)),',
            '21' => 'You can search in 2 ways:',
            '22' => 'Select Refugees from the side menu',
            '23' => 'And you search for data',
            '24' => 'Directly from the top menu from the search bar',
            '31' => 'Search for a specific phrase and the search results will pop up',
            '41' => 'You can search for a refugee using the following data:',
            '42' => 'Digital data',
            '51' => 'Explanation of the icons in the options:',
            '52' => 'View all refugee data',
            '53' => '',
        ],
        '3' => [
            'title' => 'How to edit refugee details?',
             '11' => 'or find him on the refugee list',
             '21' => 'Click on the icon',
             '22' => 'in options',
             '31' => 'Edit data and click "Save"',
        ],
        '4' => [
            'title' => 'How do I add a visit?',
            '11' => 'Check the reasons for their visit (Clothes option is selected by default) and click the "Submit" button',
        ],
        '5' => [
            'title' => 'How to add digital refugee data?',
            '11' => 'Select the appropriate option and enter data using a QR code scanner or RFID card reader',
            '21' => 'To save the data, click the "Save" button.',
        ],
        '6' => [
            'title' => 'How to use the RFID card reader?',
        ],
    ],

    'refugees' => [
        'list' => [
            'title' => 'List of refugees',
             'list' => 'List',
             'name' => 'Name and surname',
             'visits' => 'Number of visits',
             'lastvisit' => 'Last visit - needs',
             'birthdate' => 'Date of birth',
             'kids' => 'Children',
             'novisits' => 'No visits!',
             'norefugees' => 'No refugees!',
             'food' => 'Food',
             'detergents' => 'Detergents',
             'clothes' => 'Clothes',
             'button' => 'Generate List',
        ],
        'create' => [
            'title' => 'Add refugee',
            'lastname' => 'Lastname',
            'firstname' => 'Name',
            'birth' => 'Date of birth',
            'telephone' => 'Telephone number',
            'gender' => [
                'title' => 'Gender',
                'f' => 'Woman',
                'm' => 'Male',
            ],
            'address' => 'Address of stay in Poland (street number, city)',
            'work' => 'Work performed',
            'stay' => [
                'title' => 'Willingness to stay in Poland',
                'yes' => 'Yes',
                'no' => 'No',
                'maybe' => 'Maybe',
                'tdk' => "Doesn't know",
            ],
            'kids' => 'Information about children',
            'remarks' => 'Remarks',
            'button' => 'Create',
            'alert' => 'Refugee has been added successfully!',
        ],
        'edit' => [
            'title' => 'Edit refugee details',
            'edit' => 'Edit',
            'alert' => 'You have successfully edited refugee information!',
        ],
        'show' => [
            'editbutton' => 'Edit refugee details',
            'visitbutton' => 'Add visit',
            'history' => 'Visit history',
            'title' => 'Information about the refugee',
        ],
        'alert' => [
            'visit' => 'The visit has been added successfully!',
            'data' => 'Digital data changed successfully!',
        ],
        'repeating' => [
            'modalvisit' => [
                'reason' => 'Reason for visit',
                'shopvisits' => 'All store visits',
            ],
            'modaldata' => [
                'title' => 'Edit Refugee Digital Data',
            ],
        ],
    ],
];
