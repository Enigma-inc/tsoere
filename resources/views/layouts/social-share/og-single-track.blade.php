<meta property="og:title" content="{{$track->title}}" />
<meta property="og:type" content="music.song" />
<meta property="og:url" content="http://www.musicbox.co.ls" /> <!--The canonical URL of your song.-->
<meta property="og:image" content="{{$track->artwork}}"/>	<!-- An image URL which should represent your song within the graph (likely the album art). The image must be at least 50px by 50px (though minimum 200px by 200px is preferred) and have a maximum aspect ratio of 3:1. We support PNG, JPEG and GIF formats-->
<meta property="og:music:musician" content="{{$profile->name}}"/>
<meta property="og:site_name" content="Musicbox"/> <!--a human readable name of your site-->
<meta property="og:audio" content="{{$track->path}}"/>  <!--url to play this song-->
<meta property="og:audio:type" content="audio/vnd.facebook.bridge"/>
