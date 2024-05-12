const token = 'BQAasiTqktSxG3ZPydtcxSakiqjke8h2wbu6NCmF189ZuyxB3ram8jVMVOl_T-c_8c3ox_WUBS7Cb6M4CXc_pJ49hHjTJEbj72__lpJr93fQ1n923MNzGJ8-4eLO6WnwHX3G1jDyknaeA7jHPb-gtRfHLZa81mLPZ5IDgT0ArsI_oDuQ0L9eVM3i9G9rVuyMiTtWB_szMeTuij6_-fVA54jJ67XbJWD66Qog4yvKOxToExJ2If_iScpnjJ3YVDisdNPqZPq-mA9N9_3dykrRRiVp';async function fetchWebApi(endpoint, method, body) {
    const res = await fetch(`https://api.spotify.com/${endpoint}`, {
        headers: {
            Authorization: `Bearer ${token}`,
        },
        method,
        body: JSON.stringify(body)
    });
    return await res.json();
}

async function getTopTracks() {
    return (await fetchWebApi(
        'v1/me/top/tracks?time_range=long_term&limit=5', 'GET'
    )).items;
}

async function getRecommendations() {
    const topTracksIds = [
        '0YF219zSqOm9JjuKO1OZtX', '1zMcj4YDWun0XN0BCzZc4P', '5hdoDcWAZ4Ov6cntAR5MKN', '1eKBW6EIaHnW8pfObMfJKN', '6nGWEuI70w30Rvk2IEBguZ'
    ];

    return (await fetchWebApi(
        `v1/recommendations?limit=5&seed_tracks=${topTracksIds.join(',')}`, 'GET'
    )).tracks;
}

async function displayTopTracks() {
    const topTracks = await getTopTracks();
    const topTracksList = document.getElementById('topTracksList');
    topTracks.forEach(track => {
        const listItem = document.createElement('li');
        listItem.textContent = `${track.name} by ${track.artists.map(artist => artist.name).join(', ')}`;
        topTracksList.appendChild(listItem);
    });
}

async function displayRecommendedTracks() {
    const recommendedTracks = await getRecommendations();
    const recommendedTracksList = document.getElementById('recommendedTracksList');
    recommendedTracks.forEach(track => {
        const listItem = document.createElement('li');
        listItem.textContent = `${track.name} by ${track.artists.map(artist => artist.name).join(', ')}`;
        recommendedTracksList.appendChild(listItem);
    });
}

(async () => {
    await displayTopTracks();
    await displayRecommendedTracks();
})();
