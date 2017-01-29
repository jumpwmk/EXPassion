IDproblem = 1;
changeProblem();
countdown();

var arrsubject = ["Math","English","Social Study","Physics","Chemistry","Biology","Thai"];
var choice = ["choiceA", "choiceB", "choiceC", "choiceD", "choiceE"];
var alphabet = ['A', 'B', 'C', 'D', 'E'];

document.getElementById("subject").innerHTML = arrsubject[subject];

for(var i = 1; i <= countProblem; i++)
{
    ans[i] = -1;
    correctanswer[i] = 0;
}

/// function blah blah

function setcookie2(name, value1, value2)
{
    document.cookie = name + value1 + " = " + value2;
}

function setcookie1(name, value)
{
    document.cookie = name + " = " + value;
}

function checkans(it)
{
    /// isCorrect ?
    var answer = checkAnswer[index[IDproblem]];
    if(alphabet[ it ] == answer)
    {
        correctanswer[IDproblem] = 1;
        ans[IDproblem] = it;
    }
    else
    {
        correctanswer[IDproblem] = 0;
        ans[IDproblem] = it;
    }
}

function checkTask() 
{
    /// update rank
    for(var i = 1; i <= countProblem; i++)
    {
        if(correctanswer[i] == 1)
        {
            setcookie2("task",counttask,index[i]);
            counttask++;
        }
    }
    setcookie1("counttask",counttask);
    alert(counttask);
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
        var showPart = document.getElementById('timer');
        showPart.innerHTML = "Timer: เหลือเวลา " + day + " วัน " + hour + " ชั่วโมง " + minute + " นาที " + second + " วินาที"; 
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