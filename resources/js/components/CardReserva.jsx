import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";

import Pagination from "./Pagination";

const ReservationCard = () => {
    const [reservations, setReservations] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch(
                    `http://127.0.0.1:8000/api/reservations?page=${currentPage}`
                );
                const result = await response.json();
                setReservations(result.reservations.data);
                setLastPage(result.reservations.last_page);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        };

        fetchData();
    }, [currentPage]);
    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    return (
        <div className="container">
            <div className="row">
                {reservations.map((reservation) => (
                    <div key={reservation.id} className="col-md-6 mt-2">
                        <div
                            className="card bg-white col-md-10 mx-auto rounded shadow"
                            style={{ borderColor: "#FFA800" }}
                        >
                            <div className="row">
                                <div className="col-md mt-2 mb-2 m-2">
                                    <p
                                        className="card-title"
                                        style={{ color: "#FFA800" }}
                                    >
                                        <span
                                            className="nombre"
                                            style={{
                                                fontSize: "20px",
                                                fontWeight: "bold",
                                            }}
                                        >
                                            {reservation.client.razonSocial}
                                        </span>
                                    </p>
                                    <p className="card-text">
                                        <strong>Fecha:</strong>{" "}
                                        {reservation.date}
                                    </p>
                                    {/* Otros detalles del evento según tu estructura de datos */}
                                    <p className="card-text">
                                        <strong>Número de Personas:</strong>{" "}
                                        {reservation.num_people}
                                    </p>
                                    <p className="card-text">
                                        <strong>Monto Total:</strong>{" "}
                                        {reservation.total_amount}
                                    </p>
                                    <p className="card-text">
                                        <strong>Estado:</strong>{" "}
                                        {reservation.status}
                                    </p>
                                </div>
                                <div className="col-md mt-2 mb-2 text-center">
                                    <p className="card-title">
                                        <span
                                            className="categoria"
                                            style={{
                                                fontSize: "20px",
                                                fontWeight: "bold",
                                            }}
                                        >
                                            Menú a elección
                                        </span>
                                    </p>
                                    <div className="row">
                                        <div className="col d-grid gap-2 col-md-6 mx-auto">
                                            <button
                                                type="button"
                                                className="btn btn-primary m-2 editarBtn"
                                            >
                                                Editar
                                            </button>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col d-grid gap-2 col-md-6 mx-auto">
                                            <button
                                                type="button"
                                                className="btn btn-danger m-2 eliminarBtn"
                                            >
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}

                <div className="col d-flex justify-content-center mt-3">
                    <Pagination
                        currentPage={currentPage}
                        lastPage={lastPage}
                        onPageChange={handlePageChange}
                    />
                </div>
            </div>
        </div>
    );
};

const rootElement = document.getElementById("reservas");
if (rootElement) {
    ReactDOM.render(<ReservationCard />, rootElement);
}
