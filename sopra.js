var note=0;
var noteBollinger = 0;
var newsNote = 0;
var momentumm=[];
var RSI=[];

// note hasard
function hasard(max){
  return Math.floor(Math.random() * Math.floor(max));
}

//moyen mobile
function calculMMobile(data){
    var MM=[];
    for(var i = 0; i< 60; i++){
        var somme = 0;
        for(var j=0;j<20;j++){
            somme = somme + data.dataset.data[i+j][4];
        }
        somme=somme/20;
        MM.push(somme);
        somme = 0;
    }
    return MM;
}

//bollingers
function calculBollinger(data){
    var moyenne = calculMMobile(data);
    var ecartType=[];
    var minEcart = 999;
    var indice;
    for(var i = 0;i<60;i++){
        var ecart = 0;
        for(var j=0;j<20;j++){
            ecart=ecart + (moyenne[i]-data.dataset.data[i+j][4])*(moyenne[i]-data.dataset.data[i+j][4]);
        }
        ecart=ecart/20;
        ecart=Math.sqrt(ecart);
        ecartType.push(ecart);
    }
    //return la liste de ecart type
    for(var j = 0; j< 12; j++){
        if(ecartType[j]<minEcart){
            minEcart = ecartType[j];
            indice = j;
        }
    }
    if(j<11){
        if(data.dataset.data[j-1][4]-data.dataset.data[j][4]>0){
            noteBollinger=8;
        }else{
            noteBollinger=2;
        }
    }else{
        noteBollinger = 6;
    }
    console.log(noteBollinger);
    return ecartType;
}

//momentum
function CalculMomentum(data){
    var momentum=[];
    var noteM = 0;
    var signe;
    for(var i = 0; i < 30; i++){
        //positif-negatif==vendre
        //negatif-positif==acheter
        var value = data.dataset.data[i][4]-data.dataset.data[i+12][4];
        momentumm.push(value);
        if(value>0){
            signe = 1;
        }else{
            signe = 0;
        }
        momentum.push(signe);
        console.log(momentum[i]);
    }
    for(var i = 0;i<5;i++){
        if(momentum[i]==1){
            if(momentum[i]==momentum[i+1]){
                noteM += 5;
            }else{
                noteM += 2;
            }
        }else{
            if(momentum[i]==momentum[i+1]){
                noteM += 5;
            }else{
                noteM += 8;
            }
        }
        console.log(noteM);
    }
    console.log(noteM);
    return noteM/5;
}
//RSI
function calculRSI(data){
    var up = 0;
    var down = 0;
    var RSINote;
    for(var j=0;j<30;j++){
        for(var i = 0; i < 9; i++){
            if(data.dataset.data[i+j][4]-data.dataset.data[i+1+j][4]>0){
                up = up + data.dataset.data[i+j][4]-data.dataset.data[i+1+j][4];
            }else{
                down = down  + data.dataset.data[i+j+1][4]-data.dataset.data[i+j][4];
            } 
        }
        RSINote = 100 * (up/(up+down));
        RSI.push(RSINote);
    }
    
    if(RSI[29]>=70){
        RSINote = 1;
    }else if(RSINote<=30){
        RSINote = 9;
    }else{
        RSINote = 6;
    }

    return RSINote;
}
//analyse financiers
function analyseFinancier(){
    var noteF = 3;
    return noteF;
}

//note finale
function calculNote(data){
    var hasardNote = Math.pow((-1), hasard(5)) * hasard(10);
    var momentum = CalculMomentum(data);
    var noteF = analyseFinancier();
    var rsiNote = calculRSI(data);
    console.log(rsiNote);
    note = note + (rsiNote * 0.15 + hasardNote * 0.1 + momentum * 0.1 + newsNote * 0.5 + noteBollinger * 0.15)*0.8 + noteF *0.2;
}

// donner le conseil
function conseil(data){
    calculNote(data);
    var conseil = document.getElementById("conseil-Sopra");
    if(note<=4){
        conseil.innerHTML= "Vendre";
        conseil.style.color = "red";
    }else if(note>6){
        conseil.innerHTML= "Acheter";
        conseil.style.color = "green";
    }else{
        conseil.innerHTML= "Ne rien faire";
        conseil.style.color = "orange";
    }
}

//mis a jour des nouvelles
function updateNews(data){
    for(var i=1;i<4;i++){
        document.getElementById("time"+i.toString()).innerHTML= data.articles[i-1].publishedAt;
        document.getElementById("title"+i.toString()).innerHTML= data.articles[i-1].title;
        document.getElementById("des"+i.toString()).innerHTML= data.articles[i-1].description;
    }
}

var dataPoints =[];
//mis a jour de courbe 1
function addBollinger(data) {
    var ecart = calculBollinger(data);
    var moyenne = calculMMobile(data);
    console.log(moyenne);
    console.log(ecart);
    var dps = [];
	for(var i = 0; i < 60; i++) {
		dps.push({
			x: chart.options.data[0].dataPoints[i].x,
			y: [moyenne[i]+2*ecart[i],moyenne[i]-2*ecart[i]]
		});
	}
	chart.options.data.push({
		type: "rangeArea",
		name: "Bollingers",
		showInLegend: true,
		markerType: "triangle",
		markerSize: 0,
        yValueFormatString: "€##.#",
        color:"#6D77AC",
		dataPoints: dps
	});
	chart.render();
}
// courbe 3
function addMomentum(data){
    for (var i = 0 ; i < 30;i++){
        mmPoints.push({
          x: new Date(data.dataset.data[i][0]),
          y: momentumm[i]
        });
      }
      chart2.render();
}

function addRSI(data){
    for (var i = 0 ; i < 30;i++){
        rsiPoints.push({
          x: new Date(data.dataset.data[i][0]),
          y: RSI[i]
        });
      }
      chart3.render();
}

function addData(data){
    for (var i = 0 ; i < 60;i++){
      dataPoints.push({
        x: new Date(data.dataset.data[i][0]),
        y: data.dataset.data[i][4]
      });
    }
    chart.render();
    addBollinger(data);
    conseil(data);
    addMomentum(data);
    addRSI(data);
}



var d = new Date();
var beginDate = d.getFullYear().toString()+"-";
if(d.getMonth()<=9){
    beginDate =beginDate +"0"+(d.getMonth()+1).toString();
}else{
    beginDate = beginDate + (d.getMonth()+1).toString();
}
var newsBeginDate = beginDate + "-" + (d.getDate()).toString();

$.getJSON("https://newsapi.org/v2/everything?language=en&q=sopra&from="+newsBeginDate+"&apiKey=468cf88b7d3a49dabe52086671bbb4ee", updateNews);
$.getJSON("https://www.quandl.com/api/v3/datasets/EURONEXT/SOP.json?api_key=Zvxsyh15Zw6CniyvnpoL&start_date=2017-09-20&order=desc", addData);

