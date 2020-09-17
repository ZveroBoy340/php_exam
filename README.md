# php_exam
ITMO University PHP exam

Create a mini-game. The bottom line is:

    1. Character creation page. The user sets the parameters Name, Strength and Health (values ​​in the range from 1 to 9). After that, it goes to the Arena page. If you try to open other pages (except for the Save / Load page) without creating a character, you are redirected to the creation page. The characteristics of the new character must be checked with regular expressions beforehand.
    2. The Arena page. It displays the current parameters of the character, his Level (initially 1) and Experience (initially 0) and buttons to go to the Combat and Level Up pages.
    3. The Fight page. Upon opening, an enemy is generated with random parameters ranging from 1 to 9. Comparison of characteristics takes place. If the character's Strength is greater than the opponent's Health, the character wins. If the opponent's Strength is greater than the character's Health, the opponent won. If both conditions are true or both are not true, it is a draw. If the character wins, 1 experience point is added to him, if the opponent is the character's experience points are reset.
    4. The Upgrade page. When you gain 3 experience points, the character rises and 3 points of characteristics are added, which he can spend to increase Strength or Health.
    5. The Save / Load page. The player is provided with three cells to save / load the character. By checking the box next to the selected cell, the user can click the "Save" or "Load" button. All characteristics of the character will be respectively saved in the database, or loaded from it.
