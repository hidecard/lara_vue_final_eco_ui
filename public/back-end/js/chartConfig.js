import "./apexcharts.min";

// Define the theme object
const theme = {
    primary: "var(--fc-primary)",
    secondary: "var(--fc-secondary)",
    success: "var(--fc-success)",
    info: "var(--fc-info)",
    warning: "var(--fc-warning)",
    danger: "var(--fc-danger)",
    dark: "var(--fc-dark)",
    light: "var(--fc-light)",
    white: "var(--fc-white)",
    gray100: "var(--fc-gray-100)",
    gray200: "var(--fc-gray-200)",
    gray300: "var(--fc-gray-300)",
    gray400: "var(--fc-gray-400)",
    gray500: "var(--fc-gray-500)",
    gray600: "var(--fc-gray-600)",
    gray700: "var(--fc-gray-700)",
    gray800: "var(--fc-gray-800)",
    gray900: "var(--fc-gray-900)",
    black: "var(--fc-black)",
    transparent: "transparent",
};

// Function to render the revenue chart
export function renderRevenueChart(elementId) {
    const options = {
        series: [
            { name: "Total Income", data: [31, 40, 28, 51, 42, 67, 100] },
            { name: "Total Expense", data: [78, 32, 45, 79, 34, 44, 38] },
        ],
        labels: [
            "Jan",
            "Feb",
            "March",
            "April",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        chart: {
            height: 350,
            type: "area",
            toolbar: { show: false },
        },
        dataLabels: { enabled: false },
        markers: {
            size: 5,
            hover: { size: 6, sizeOffset: 3 },
        },
        colors: ["#0aad0a", "#ffc107"],
        stroke: { curve: "smooth", width: 2 },
        grid: { borderColor: theme.gray300 },
        xaxis: {
            labels: {
                show: true,
                align: "right",
                style: {
                    fontSize: "12px",
                    fontWeight: 400,
                    colors: [theme.gray600],
                    fontFamily: '"Inter", "sans-serif"',
                },
            },
            axisBorder: { show: true, color: theme.gray300 },
            axisTicks: { show: true, color: theme.gray300 },
        },
        legend: {
            position: "top",
            fontWeight: 600,
            labels: { colors: theme.gray600 },
            markers: { width: 8, height: 8 },
        },
        yaxis: {
            labels: {
                formatter: (val) => `${val}k`,
                show: true,
                style: {
                    fontSize: "12px",
                    fontWeight: 400,
                    colors: theme.gray600,
                    fontFamily: '"Inter", "sans-serif"',
                },
            },
        },
    };
    new ApexCharts(document.getElementById(elementId), options).render();
}

// Function to render the total sales chart
export function renderTotalSaleChart(elementId) {
    const options = {
        series: [6000, 2000, 1000, 600],
        labels: ["Shippings", "Refunds", "Order", "Income"],
        colors: ["#0aad0a", "#ffc107", "#db3030", "#016bf8"],
        chart: { type: "donut", height: 280 },
        legend: { show: false },
        dataLabels: { enabled: false },
        plotOptions: {
            pie: {
                donut: {
                    size: "85%",
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: "22px",
                            fontFamily: '"Inter", "sans-serif"',
                            fontWeight: 600,
                            colors: [theme.gray600],
                            offsetY: -10,
                        },
                        value: {
                            show: true,
                            fontSize: "24px",
                            fontFamily: '"Inter", "sans-serif"',
                            fontWeight: 800,
                            colors: theme.gray800,
                            offsetY: 8,
                        },
                        total: {
                            show: true,
                            label: "Total Sales",
                            fontSize: "16px",
                            fontFamily: '"Inter", "sans-serif"',
                            fontWeight: 400,
                            colors: theme.gray400,
                            formatter: (e) =>
                                e.globals.seriesTotals.reduce(
                                    (acc, val) => acc + val,
                                    0
                                ),
                        },
                    },
                },
            },
        },
        stroke: { width: 0 },
        responsive: [
            {
                breakpoint: 1400,
                options: {
                    chart: { type: "donut", width: 290, height: 330 },
                },
            },
        ],
    };
    new ApexCharts(document.getElementById(elementId), options).render();
}
