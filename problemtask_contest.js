IDproblem = 1;
changeProblem();
countdown();

var arrsubject = ["Math","English","Social Study","Physics","Chemistry","Biology","Thai"];
var choice = ["choiceA", "choiceB", "choiceC", "choiceD", "choiceE"];
var alphabet = ['A', 'B', 'C', 'D', 'E'];

// document.getElementById("subject").innerHTML = arrsubject[subject];

for(var i = 1; i <= countProblem; i++)
{
    ans[i] = -1;
    correctanswer[i] = 0;
}

/// function blah blah

function check(index)
{
    document.getElementById(choice[ index ]).checked = true;
}

function checkTask() 
{
    /// update rank
    for(var i = 1; i < countProblem; i++)
    {
        if(correctanswer[i] == 1)
        {
            document.cookie = "task" + counttask + " = " + index[i];
            counttask++;
            document.cookie = "counttask = " + counttask;
        }
    }
    reload();
}

function reload()
{
    location.reload();
}

function changeProblem()
{
    document.getElementById("problemtask").innerHTML = problem[index[IDproblem]];
    document.getElementById("dataChoiceA").innerHTML = dataChoiceA[index[IDproblem]];
    document.getElementById("dataChoiceB").innerHTML = dataChoiceB[index[IDproblem]];
    document.getElementById("dataChoiceC").innerHTML = dataChoiceC[index[IDproblem]];
    document.getElementById("dataChoiceD").innerHTML = dataChoiceD[index[IDproblem]];   
}

function countdown() //countdown
{
    document.getElementById('subject').innerHTML = m; 
    var timeA = new Date(); // date now
    var timeB = new Date(y,m,d,h,mi,s,0); //year month day hour minute second millisecond
    var timeDifference = timeB.getTime() - timeA.getTime();   
    if(timeDifference >= 0)
    {
        timeDifference = timeDifference/1000;
        timeDifference = Math.floor(timeDifference);
        var day = Math.floor(timeDifference/86400);
        var l_day = timeDifference%86400;
        var hour = Math.floor(l_day/3600);
        var l_hour = l_day % 3600;
        var minute = Math.floor(l_hour/60);
        var second = l_hour%60;
        var showPart = document.getElementById('subject');
        showPart.innerHTML = "เหลือเวลา " + day + " วัน " + hour + " ชั่วโมง " + minute + " นาที " + second + " วินาที"; 
        if(day == 0 && hour == 0 && minute == 0 && second == 0)
        {
            window.alert = "หมดเวลาการแข่งขัน";
            location.reload();
            clearInterval(iCountDown); // cancel 
        }
    }
    var iCountDown = setInterval("countdown()",1000); 
}

function clickright()
{
    var check = [];
    for(var i = 0; i < 4; i++)
    {
        check[ i ] = document.getElementById(choice[ i ]).checked;
    }

    /// isCorrect ?
    var answer = checkAnswer[index[IDproblem]];
    for(var i = 0; i < 4; i++)
    {
        if((document.getElementById(choice[ i ]).checked == true) && (alphabet[ i ] == answer))
        {
            correctanswer[IDproblem] = 1;
            ans[IDproblem] = i;
        }
        if(document.getElementById(choice[ i ]).checked == true)
        {
            ans[IDproblem] = i;
        }
    }

    if(IDproblem == countProblem)
    {
        window.alert('นี่เป็นข้อสุดท้ายยย !');
    }
    else
    {
        IDproblem++;
        ///reset
        for(var i = 0; i < 4; i++)
        {
            document.getElementById(choice[ i ]).checked = false;
        }

        if(ans[IDproblem] != -1)
        {
            document.getElementById(choice[ ans[IDproblem] ]).checked = true;
        }
        changeProblem();
    }
}

function clickleft()
{
    var check = [];
    for(var i = 0; i < 4; i++)
    {
        check[ i ] = document.getElementById(choice[ i ]).checked;
    }

    /// isCorrect ?
    var answer = checkAnswer[index[IDproblem]];
    for(var i = 0; i < 4; i++)
    {
        if((document.getElementById(choice[ i ]).checked == true) && (alphabet[ i ] == answer))
        {
            correctanswer[IDproblem] = 1;
            ans[IDproblem] = i;
        }
        if(document.getElementById(choice[ i ]).checked == true)
        {
            ans[IDproblem] = i;
        }
    }

    if(IDproblem == 1)
    {
        window.alert('ข้อแรก !');
    }
    else
    {
        IDproblem--;
        ///reset
        for(var i = 0; i < 4; i++)
        {
            document.getElementById(choice[ i ]).checked = false;
        }

        if(ans[IDproblem] != -1)
        {
            document.getElementById(choice[ ans[IDproblem] ]).checked = true;
        }
        changeProblem();
    }
}