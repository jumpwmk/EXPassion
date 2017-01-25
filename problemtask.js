document.getElementById("problemtask").innerHTML = problem[IDproblem];
document.getElementById("dataChoiceA").innerHTML = dataChoiceA[IDproblem];
document.getElementById("dataChoiceB").innerHTML = dataChoiceB[IDproblem];
document.getElementById("dataChoiceC").innerHTML = dataChoiceC[IDproblem];
document.getElementById("dataChoiceD").innerHTML = dataChoiceD[IDproblem];
var choice = ["choiceA", "choiceB", "choiceC", "choiceD", "choiceE"];
var alphabet = ['A', 'B', 'C', 'D', 'E'];

document.getElementById("score").innerHTML = binaryTask[1];

/// function blah blah

function check(index)
{
    document.getElementById(choice[ index ]).checked = true;
}

function checkTask() 
{
    var check = [];
    var IsAnswer = false;
    for(var i = 0; i < 4; i++)
    {
        check[ i ] = document.getElementById(choice[ i ]).checked;
    }

    /// isCorrect ?
    var answer = checkAnswer[IDproblem];
    var isCorrect = false;
    for(var i = 0; i < 4; i++)
    {
        if((document.getElementById(choice[ i ]).checked == true) && (alphabet[ i ] == answer))
            isCorrect = true;
        if(document.getElementById(choice[ i ]).checked == true)
            IsAnswer = true;
    }

    if(!IsAnswer)
    {
        window.alert('5555555');
        return;
    }

    alluser[IDproblem]++;
    document.cookie = "alluser" + countUpdateAll + " = " + IDproblem;
    countUpdateAll++;
    document.cookie = "alluser" + countUpdateAll + " = " + alluser[IDproblem];
    countUpdateAll++;
    document.cookie = "alluser = " + countUpdateAll;

    /// update rank
    if(isCorrect == true)
    {
        pass[IDproblem]++;
        document.cookie = "pass" + countpass + " = " + IDproblem;
        countpass++;
        document.cookie = "pass" + countpass + " = " + pass[IDproblem];
        countpass++;
        document.cookie = "pass = " + countpass;

        document.cookie = "task" + counttask + " = " + IDproblem;
        counttask++;
        document.cookie = "counttask = " + counttask;

        /// update binaryTask
        binaryTask[IDproblem] = '1';

        rankup();
    }
    else
    {
        rankdown();
    }
    
    /// reset
    for(var i = 0; i < 4; i++)
    {
        document.getElementById(choice[ i ]).checked = false;
    }

    changeSQL();

    document.getElementById("score").innerHTML = expOfUser;
    
    randomProblem();
    changeProblem();

    /// rank user update
    if( expOfUser >= 100 )
    {
        if(rankOfUser < 20)
        {
            rankOfUser++;
            expOfUser -= 100;
            window.alert('levelup');
            document.cookie = "rankOfUser = " + rankOfUser;
            document.cookie = "expOfUser = " + expOfUser;
            reload();
        }
    }
    else
    {
        document.cookie = "rankOfUser = " + rankOfUser;
        document.cookie = "expOfUser = " + expOfUser;
    }
}

function rankup()
{
    expOfUser = expOfUser + 15 + 2 * (rank[IDproblem] - rank20[IDproblem] * 5);
}

function rankdown() 
{
    expOfUser = expOfUser - 5 - 2 * (rank[IDproblem] - rank20[IDproblem] * 5);
}

function reload()
{
    location.reload();
}

function randomProblem()
{
    for(var i = 0; i < 30; i++)
    {
        IDproblem = Math.floor((Math.random() * countProblem)) + 1;
        if(binaryTask[IDproblem] == '0')
        {
            break;
        }
    }
}

function changeProblem()
{
    document.getElementById("problemtask").innerHTML = problem[IDproblem];
    document.getElementById("dataChoiceA").innerHTML = dataChoiceA[IDproblem];
    document.getElementById("dataChoiceB").innerHTML = dataChoiceB[IDproblem];
    document.getElementById("dataChoiceC").innerHTML = dataChoiceC[IDproblem];
    document.getElementById("dataChoiceD").innerHTML = dataChoiceD[IDproblem];
}

function changeSQL() ///update rank of task
{
    rank[IDproblem] = parseInt(100 - parseInt((pass[IDproblem]*100)/alluser[IDproblem]));
    rank20[IDproblem] = parseInt(rank[IDproblem]/5);

    document.getElementById("score").innerHTML = rank[IDproblem];

    document.cookie = "rank" + countrank + " = " + IDproblem;
    countrank++;
    document.cookie = "rank" + countrank + " = " + rank[IDproblem];
    countrank++;
    document.cookie = "rank = " + countrank;

    document.cookie = "rank20" + countrank20 + " = " + IDproblem;
    countrank20++;
    document.cookie = "rank20" + countrank20 + " = " + rank20[IDproblem];
    countrank20++;
    document.cookie = "rank20 = " + countrank20;

}