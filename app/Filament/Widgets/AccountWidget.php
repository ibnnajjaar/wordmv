<?php

namespace App\Filament\Widgets;

class AccountWidget extends \Filament\Widgets\AccountWidget
{
    protected string $view = 'filament.widgets.account-widget';

    protected int | string | array $columnSpan = [
        'md' => 'full',
        'xl' => 1,
    ];

    protected function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'user'               => $this->getUser(),
            'greeting'           => $this->greeting(),
            'affirmationMessage' => $this->affirmationMessage(),
        ]);
    }

    public function getUser()
    {
        return filament()->auth()->user();
    }

    public function greeting(): string
    {
        return __(':greeting, :user!', [
            'greeting' => $this->timeBasedGreeting(),
            'user'     => filament()->getUserName($this->getUser()),
        ]);
    }

    public function affirmationMessage(): string
    {
        // List of positively affirming messages
        $messages = [
            '"Success is not final, failure is not fatal: It is the courage to continue that counts." ~Winston Churchill',
            '"It always seems impossible until it’s done." ~Nelson Mandela',
            '"You may not control all the events that happen to you, but you can decide not to be reduced by them." ~Maya Angelou',
            '"It does not matter how slowly you go as long as you do not stop." ~Confucius',
            '"Believe you can and you’re halfway there." ~Theodore Roosevelt',
            '"In the middle of every difficulty lies opportunity." ~Albert Einstein',
            '"Keep your face to the sunshine and you cannot see a shadow." ~Helen Keller',
            '"The future belongs to those who believe in the beauty of their dreams." ~Eleanor Roosevelt',
            '"When everything seems to be going against you, remember that the airplane takes off against the wind, not with it." ~Henry Ford',
            '"Faith is taking the first step even when you don’t see the whole staircase." ~Martin Luther King Jr.',
            '"Spread love everywhere you go. Let no one ever come to you without leaving happier." ~Mother Teresa',
            '"Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work." ~Steve Jobs',
            '"The secret of getting ahead is getting started." ~Mark Twain',
            '"Turn your wounds into wisdom." ~Oprah Winfrey',
            '"What lies behind us and what lies before us are tiny matters compared to what lies within us." ~Ralph Waldo Emerson',
            '"Happiness is not something ready-made. It comes from your own actions." ~Dalai Lama',
            '"Energy and persistence conquer all things." ~Benjamin Franklin',
            '"Do not pray for an easy life, pray for the strength to endure a difficult one." ~Bruce Lee',
            '"Rock bottom became the solid foundation on which I rebuilt my life." ~J.K. Rowling',
            '"It’s not whether you get knocked down, it’s whether you get up." ~Vince Lombardi',
        ];

        // Get the current date using Carbon and day of the year (1-365)
        $currentDayOfYear = now()->dayOfYear;

        // Determine the index of the message using modulus to cycle through messages
        $index = $currentDayOfYear % count($messages);

        // Return the selected message
        return $messages[array_rand($messages)];
    }

    public function timeBasedGreeting(): string
    {
        // Get the current hour using Carbon
        $currentHour = now()->format('H'); // 24-hour format

        // Determine the greeting based on the hour
        if ($currentHour >= 5 && $currentHour < 12) {
            return 'Good Morning';
        }
        if ($currentHour >= 12 && $currentHour < 17) {
            return 'Good Afternoon';
        }

        return 'Good Evening';
    }
}
