var note;

function hasard(max){
  return Math.floor(Math.random() * Math.floor(max));
}

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
function calculBollinger(data){
    var moyenne = calculMMobile(data);
    var ecartType=[];
    for(var i = 0;i<60;i++){
        var ecart = 0;
        for(var j=0;j<20;j++){
            ecart=ecart + (moyenne[i]-data.dataset.data[i+j][4])*(moyenne[i]-data.dataset.data[i+j][4]);
        }
        ecart=ecart/20;
        ecart=Math.sqrt(ecart);
        ecartType.push(ecart);
    }
    
    return ecartType;
}

function CalculMomentum(data){
    var momentum=[];
    for(var i = 0; i< 10; i++){
        momentum.push();
    }
    return momentum;
}

function calculNote(){
    
    return note;
}

function conseil(){
    var conseil = document.getElementById("conseil-airbus");
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

function updateNews(data){
    for(var i=1;i<4;i++){
        document.getElementById("time"+i.toString()).innerHTML= data.articles[i-1].publishedAt;
        document.getElementById("title"+i.toString()).innerHTML= data.articles[i-1].title;
        document.getElementById("des"+i.toString()).innerHTML= data.articles[i-1].description;
    }
}

var dataPoints =[];

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
function addData(data){
    for (var i = 0 ; i < 60;i++){
      dataPoints.push({
        x: new Date(data.dataset.data[i][0]),
        y: data.dataset.data[i][4]
      });
    }
    chart.render();
    addBollinger(data);
    conseil();
}



var d = new Date();
var beginDate = d.getFullYear().toString()+"-";
if(d.getMonth()<=9){
    beginDate =beginDate +"0"+(d.getMonth()+1).toString();
}else{
    beginDate = beginDate + (d.getMonth()+1).toString();
}
var newsBeginDate = beginDate + "-" + (d.getDate()).toString();

$.getJSON("https://newsapi.org/v2/everything?language=en&q=airbus&from="+newsBeginDate+"&apiKey=468cf88b7d3a49dabe52086671bbb4ee", updateNews);
$.getJSON("https://www.quandl.com/api/v3/datasets/EURONEXT/BN.json?api_key=Zvxsyh15Zw6CniyvnpoL&start_date=2017-09-20&order=desc", addData);

