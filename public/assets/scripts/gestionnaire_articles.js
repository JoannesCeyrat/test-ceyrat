var Gestionnaire_articles = function() {
	this.indexAdded=0;
	/***
	* function récupértion intégrale du json
	* @ param string
	* @ return array 
	*/
	this.get_all = function(data) 
	{
		
		articles =[];
				
		$.each( data, function( key, val ) {
		    articles[key] = val;
		  });		
		

		return articles;
	}


	/***
	* function  tri sur date d
	* @ param array 
	* @ return 5 first sorted elements of the param
	*/
	this.get_fresh_five = function(arr)
	{
		arr.sort( function(a,b) {

				if (a.date_add < b.date_add) { 
					return 1;
				}
				else if ( a.date_add > b.date_add ) {
					return -1;
				}
				else {
					return 0;
				}
				
			});

		return arr.slice(0, 5 );
	}


	/***
	* f
	* @ param array
	* @ return array of 5 lasts elements of the param
	*/
	this.get_last_five = function(arr)
	{
		
		return arr.slice( (arr.length-5) );
	}


	/*****
	* ajoute les articles au dom
	* @ param id of mother
	* @ param obj
	* @ return void
	****/
	this.add_to_element = function(id, obj)
	{
		m = moment(obj.date_add);
		df = m.format("dddd")+"<br><span class=\"jour\">"+m.format("DD")+" "+m.format("MMM")+"</span><br><span class=\"an\">"+m.format("YYYY")+"</span>";
		d="<div class=\"col-xs-12 cache\" id=\"art"+this.indexAdded+"\"> \
					<div class=\"col-xs-12 contour margeTop\" > \
						<div class=\"col-xs-4 col-md-2\"><div class=\"dateFormat\">"+ df +"</div><p class=\"hh\">"+m.format("HH")+"h"+m.format("mm")+"</p></div>\
						<div class=\"col-xs-8 col-md-10\"><h3>"+obj.title+"</h3><h5>"+obj.author+"</h5><p>"+obj.content+"</p></div>\
					</div>\
				</div>";

		$( ("#"+id) ).append(d);
		this.indexAdded++;
	}


	/****************
	* affiche l'element enfant de @param idMother d'index @param idChild
	* @ return void
	*/
	this.display_element = function(idMother, idChild)
	{
		$( ("#"+idMother) ).children( ("#"+idChild) ).css("opacity", 1);
	}

	/****************
	* tronque tous les chaines de @param clef à @param longueur de @param arr
	* @ return void
	*/
	this.tronque_content = function(arr, clef, longueur)
	{
		for(i=0; i<arr.length; i++) {
			arr[i][clef] = arr[i][clef] .substring(0,(longueur-1));
		}
	}

};