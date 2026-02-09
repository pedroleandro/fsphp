<?php

namespace Source\DTO;

class PremierLeagueDTO
{
    public readonly string $Player;
    public readonly string $Team;
    public readonly string $Position;
    public readonly string $Position_Group;

    public readonly int $Appearances;
    public readonly int $Minutes;
    public readonly float $Minutes_Per_Appearance;

    public readonly int $Goals;
    public readonly int $Assists;
    public readonly int $Goal_Contributions;

    public readonly float $Goals_Per_90;
    public readonly float $Assists_Per_90;
    public readonly float $Goal_Contributions_Per_90;

    public readonly float $Minutes_Per_Goal;
    public readonly float $Minutes_Per_Assist;

    public readonly int $Yellow_Cards;
    public readonly int $Red_Cards;
    public readonly float $Discipline_Score;

    public readonly int $Clean_Sheets;
    public readonly float $Clean_Sheet_Percentage;

    public readonly int $Goals_Rank;
    public readonly int $Assists_Rank;
    public readonly int $Goal_Contributions_Rank;
    public readonly int $Clean_Sheets_Rank;
    public readonly int $Efficiency_Rank;

    public readonly string $Performance_Category;
    public readonly string $Discipline_Category;
    public readonly float $Efficiency_Rating;

    public readonly string $Season;
    public readonly string $Competition;
    public readonly string $Country;
    public readonly string $League_Name;
    public readonly int $League_Level;

    public readonly string $Data_Collection_Date;
}