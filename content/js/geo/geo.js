/**
 * Created by Ken on 12/03/14.
 */
/**
 * Fonction de callback dans laquelle on traite les coordonnées de l'utilisateur
 * @author Alban Truc
 * @param position Position de l'utilisateur
 * @since 20/01/2014
 * Dernière update: 11/03/2014
 */
function currentHumanReadablePosition(position)
{
    //Coordonnées actuelles de l'utilisateur
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    //Création des objets nécessaires pour utiliser l'API
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    /*
     Processus de Reverse Geocoding: transformer des coordonnées (longitude et latitude)
     en adresse lisible par l'humain.
     */
    geocoder.geocode({'latLng': latlng}, function(results, status)
    {
        if(status == google.maps.GeocoderStatus.OK)
        {
            /*
             Plusieurs résultats sont fournis, le second (results[1]) fournit une adresse formatée
             en général suffisamment précise sans pour autant l'être trop.
             */
            if(results[1])
                $('#geolocation').val(results[1].formatted_address);
        }
        else
        //Probablement à retirer, l'utilisateur n'a de toutes façon pas à avoir ces données
            $('#geolocation').val('Geocoder failed due to: ' + status);
    });
}

/**
 * Récupère la localisation de l'utilisateur par son navigateur.
 * Nécessite son approbation.
 * @author Alban Truc
 * @since 20/01/2014
 */
if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition(currentHumanReadablePosition);

