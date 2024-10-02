<?php

function replaceKeywords($text) {
    $translations = [
        'fr' => [
            'Login' => 'Connexion',
            'Register' => 'S`inscrire',
            'Username' => 'Utilisateur',
            'Password' => 'Mot de passe',
            'All Posts' => 'Les posts',
            'Select Language' => 'Sélectionner la langue',
            'Create at' => 'Créé à',
            'Title' => 'Titre',
            'Content' => 'Contenu',
            'Add Post' => 'Ajouter un post',
            'Add Comment' => 'Ajouter commentaire',
            'Comment' => 'Commentaire',
            'Add' => 'Ajouter',
            'Users' => 'Utilisateurs',
            'Delete' => 'Supprimer',
            'Guest' => 'Visiteur',
	    'Do you have an account?' => 'Avez-vous un compte?',
	    'Logout' => 'Déconnexion',
	    'No account?' => 'Pas de compte?',
        ],
        'ar' => [
            'Login' => 'الدخول',
            'Register' => 'تسجيل',
            'Username' => 'اسم المستخدم',
            'Password' => 'كلمة المرور',
            'All Posts' => 'جميع المنشورات',
            'Select Language' => 'اختر اللغة',
            'Create at' => 'إنشاء في',
            'Title' => 'عنوان',
            'Content' => 'محتوى',
            'Add Post' => 'إضافة منشور',
            'Add Comment' => 'إضافة تعليق',
            'Comment' => 'تعليق',
            'Add' => 'إضافة',
            'Users' => 'المستخدمون',
            'Delete' => 'حذف',
            'Guest' => 'زائر',
	    'Do you have an account?' => '?هل لديك حساب',
 	    'Logout' => 'تسجيل الخروج',
	    'No account?' => 'ليس لديك حساب؟',
        ],
        // Add more languages as needed
    ];

    // Check if language is set in session, default to English otherwise
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';

    // Use appropriate keywords based on language
    if (array_key_exists($lang, $translations)) {
        foreach ($translations[$lang] as $original => $replacement) {
            $text = str_replace($original, $replacement, $text);
        }
    }

    return $text;
}
