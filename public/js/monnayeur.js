function ajoutPiece(iP) {
	nbtotal += pieces[iP].type;
	pieces[iP].nb++
	nbPiece = Number($('#'+pieces[iP].type+'').prop('value'));
	newValue = nbPiece+1;
	$('#'+pieces[iP].type+'').prop('value', newValue);
	affichePiece();
}

function reset() {
	$('.coinForm').prop('value', 0);
}

function affichePiece() {
	$('.monnaie').html(nbtotal/100 + ' €');
	for (let i = 0; i < pieces.length; i++) {
		$('.displayCount:eq('+i+')').html(pieces[i].nb);
	}
}

function monnayeur(prix) {
	let rendu = nbtotal - prix;

	if ( rendu < 0 ) {
		$('#affichageChoix .boissons').html('Monnaie insufisante');
		} else {
			testComptage(rendu, pieces);
			}

	function testComptage(aRendre, tPieces) {
		let testPieces = [];
		let testRendu = aRendre;
		for (let i = 0; i < tPieces.length; i++) {
			testPieces.push(tPieces[i].nb);
		};
		
		for (let i = 0; i < 6; i++) {
			while ( (testRendu >= tPieces[i].type) && (testPieces[i] > 0) ){
				if ( (i == 2) && (testRendu == 60) && ((testPieces[4] == 0) && (testPieces[5] < 1)) ) {
					i++;
				} else {
					testRendu -= tPieces[i].type;
					testPieces[i]--;
				}
			}
		}
		if (testRendu > 0) {
			$('#affichageChoix .boissons').html("Ne pourras pas rendre la monnaie");
			} else if (testRendu === 0) {
				if (rendu > 0) {
					console.log('A rendre : ' + rendu/100 + '€');
				}
				comptage();
				} else {
					$('#affichageChoix .boissons').html("Une erreur s'est produite");
					}
	}

	function comptage() {
		let listeRendu = ['Vos pieces : '];
		let pieceRendu = [0, 0, 0, 0, 0, 0];
		for (let i = 0; i < 6; i++) {
			while ( (rendu >= pieces[i].type) && (pieces[i].nb > 0) ){
				if ( (i == 2) && (rendu == 60) && ((pieces[4].nb == 0) && (pieces[5].nb < 1)) ) {
					i++;
				} else {
					rendu -= pieces[i].type;
					pieceRendu[i]++;
					pieces[i].nb--;
				}
			}
			if (pieceRendu[i] > 0) {
				listeRendu.push(pieceRendu[i] + (' piece(s) de ' + pieces[i].type/100 + '€'));
				}
		}
		if (prix > 0) {
			affichageGob();
		}
		if (listeRendu.length > 1) {
			Processus(listeRendu);
			console.log(' ');
		}
		nbtotal = rendu;
		affichePiece();
	}
}

function Processus (liste) {
	for (let i = 0; i < liste.length; i++) {
		console.log(liste[i]);
	}
}