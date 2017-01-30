randomProblem();
changeProblem();

var arrsubject = ["Math","English","Social Study","Physics","Chemistry","Biology","Thai"];
var choice = ["choiceA", "choiceB", "choiceC", "choiceD", "choiceE"];
var alphabet = ['A', 'B', 'C', 'D', 'E'];

document.getElementById("score").innerHTML = expOfUser;
document.getElementById("subject").innerHTML = arrsubject[subject];

/// function blah blah

function check(it)
{
    document.getElementById(choice[ it ]).checked = true;
}

function downloadpdf()
{
    document.getElementById("pdf").href = "/pdf/" + index[IDproblem] + ".pdf";
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
    var answer = checkAnswer[index[IDproblem]];
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

    alluser[index[IDproblem]]++;
    document.cookie = "alluser" + countUpdateAll + " = " + index[IDproblem];
    countUpdateAll++;
    document.cookie = "alluser" + countUpdateAll + " = " + alluser[index[IDproblem]];
    countUpdateAll++;
    document.cookie = "alluser = " + countUpdateAll;

    /// update rank
    if(isCorrect == true)
    {
        pass[index[IDproblem]]++;
        document.cookie = "pass" + countpass + " = " + index[IDproblem];
        countpass++;
        document.cookie = "pass" + countpass + " = " + pass[index[IDproblem]];
        countpass++;
        document.cookie = "pass = " + countpass;

        document.cookie = "task" + counttask + " = " + index[IDproblem];
        counttask++;
        document.cookie = "counttask = " + counttask;

        /// update binaryTask
        binaryTask[index[IDproblem]] = '1';

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
    expOfUser = expOfUser + 15 + 2 * (rank[index[IDproblem]] - rank10[index[IDproblem]] * 5);
}

function rankdown() 
{
    expOfUser = expOfUser - 5 - 2 * (rank[index[IDproblem]] - rank10[index[IDproblem]] * 5);
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
        if(binaryTask[index[IDproblem]] == '0')
        {
            break;
        }
    }
}

function changeProblem()
{
    document.getElementById("problemtask").innerHTML = problem[index[IDproblem]];
    document.getElementById("dataChoiceA").innerHTML = dataChoiceA[index[IDproblem]];
    document.getElementById("dataChoiceB").innerHTML = dataChoiceB[index[IDproblem]];
    document.getElementById("dataChoiceC").innerHTML = dataChoiceC[index[IDproblem]];
    document.getElementById("dataChoiceD").innerHTML = dataChoiceD[index[IDproblem]];
    document.getElementById("pass").innerHTML = "Pass: " + pass[index[IDproblem]];
    document.getElementById("alluser").innerHTML = "Alluser: " + alluser[index[IDproblem]];
    var tmp = rank10[index[IDproblem]];
    var stringstar = ["star1","star2","star3","star4","star5"];
    for(var i = 0; i < 5; i++)
    {
        if(2*i + 1 <= tmp)
            document.getElementById(stringstar[i]).className = "fi-star half";
        if(2*i + 2 <= tmp)
            document.getElementById(stringstar[i]).className = "fi-star";
    }
    
}

function changeSQL() ///update rank of task
{
    rank[index[IDproblem]] = parseInt(100 - parseInt((pass[index[IDproblem]]*100)/alluser[index[IDproblem]]));
    rank10[index[IDproblem]] = parseInt(rank[index[IDproblem]]/5);
    coin += 5 * rank10[index[IDproblem]];

    document.getElementById("score").innerHTML = expOfUser;

    document.cookie = "rank" + countrank + " = " + index[IDproblem];
    countrank++;
    document.cookie = "rank" + countrank + " = " + rank[index[IDproblem]];
    countrank++;
    document.cookie = "rank = " + countrank;

    document.cookie = "rank10" + countrank10 + " = " + index[IDproblem];
    countrank10++;
    document.cookie = "rank10" + countrank10 + " = " + rank10[index[IDproblem]];
    countrank10++;
    document.cookie = "rank10 = " + countrank10;

    document.cookie = "coin = " + coin;

}