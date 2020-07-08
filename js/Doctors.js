// JavaScript source code
function SeeAllClick(){
	    var seeall = document.querySelector('.SearchForm');
        var top4 = document.querySelector('.team-section');
		top4.style.display = 'none';
		seeall.style.display='block';        
}

function SeeTop4(){
	    var seeall = document.querySelector('.SearchForm');
        var top4 = document.querySelector('.team-section');
		seeall.style.display='none';  
		top4.style.display = 'block';
		      
}