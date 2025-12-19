const placeCoach = document.querySelector(".place-coach");
const btnCoach = document.querySelector(".btn-coach");
const btnSportif = document.querySelector(".btn-sportif");

btnCoach.addEventListener('click', () => {
    placeCoach.classList.remove("hidden");
})

btnSportif.addEventListener('click', () => {
    placeCoach.classList.add("hidden");
})

