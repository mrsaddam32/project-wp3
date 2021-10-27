let ctx = document.getElementById("covidChart").getContext("2d");
const labels = Utils.months({ count: 12 });
let chart = new Chart(ctx, {
	type: "line",
	data: {
		labels: "labels",
		datasets: [
			{
				label: "Test chart.js",
				data: [65, 80, 20, 100, 150, 200, 250, 120, 800, 300, 110, 78],
				fill: false,
				borderColor: "rgb(75,192,192)",
				tension: 0.1,
			},
		],
	},
});
