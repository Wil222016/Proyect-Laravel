import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";

import Pagination from "./Pagination";
import Modal from "./Modal";

const TarjetaPlato = () => {
    const [offeredMenus, setOfferedMenus] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [menu, setMenu] = useState(null);
    const [showModal, setShowModal] = useState(false);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch(
                    `http://127.0.0.1:8000/api/offered-menus?page=${currentPage}`
                );
                const result = await response.json();
                setOfferedMenus(result.offeredMenus.data);
                setLastPage(result.offeredMenus.last_page);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        };

        fetchData();
    }, [currentPage]);

    const formatFecha = (fechaString) => {
        const options = { day: "2-digit", month: "long", year: "numeric" };
        const fecha = new Date(fechaString);
        return fecha.toLocaleDateString("es-ES", options);
    };

    const handleReservaClick = (menu) => {
        setMenu(menu);
        setShowModal(true);
    };

    const handleSubmit = (data) => {
        // Aquí puedes agregar el código para enviar los datos a través de una API
        console.log("Datos enviados:", data);
        setShowModal(false);
    };
    function formatTime(timeString) {
        const date = new Date(timeString);
        const formattedTime = date.toLocaleTimeString([], {
            hour: "2-digit",
            minute: "2-digit",
        });
        return formattedTime;
    }

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    return (
        <div className="container">
            <div className="row">
                {offeredMenus.map((menu) => (
                    <div key={menu.id} className="col-md-6 mt-2">
                        <div className="card shadow">
                            {menu.photo ? (
                                <img
                                    src={`/storage/${menu.photo}`}
                                    className="img-fluid rounded-top"
                                    alt="imagenPlato"
                                    style={{
                                        height: "400px",
                                        objectFit: "cover",
                                    }}
                                />
                            ) : (
                                <div className="img-fluid rounded-start placeholder">
                                    <img
                                        src={menu.photo}
                                        className="img-fluid rounded-start"
                                        alt="imagenPlato"
                                    />
                                </div>
                            )}
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-8">
                                        <p
                                            className="fs-6 mb-0"
                                            style={{ color: "#FFA800" }}
                                        >
                                            Comida{" "}
                                            <strong className="fs-6">
                                                {menu.type_menu.name}
                                            </strong>
                                        </p>
                                    </div>
                                    <div className="col-4 d-flex justify-content-end">
                                        <p className="fw-bold mb-0">
                                            {menu.category.name}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    style={{
                                        width: "100%",
                                        background: "#FFA800",
                                        height: "1px",
                                        margin: "10px 0",
                                    }}
                                ></div>
                                <div className="row">
                                    <div className="col">
                                        <p className="fw-bold mb-0">Entrada:</p>
                                        {menu.dishes.map((dish) => (
                                            <p key={dish.id} className="mb-0">
                                                {dish.name}
                                            </p>
                                        ))}
                                        <br />
                                        <p className="fw-bold mb-0">
                                            Plato Principal:
                                        </p>
                                        {menu.dishes.map((dish) => (
                                            <p key={dish.id} className="mb-0">
                                                {dish.name}
                                            </p>
                                        ))}
                                    </div>
                                    <div className="col">
                                        <div
                                            className="fw-bold text-center mt-0 rounded"
                                            style={{
                                                background: "#FFA800",
                                                color: "#ffff",
                                            }}
                                        >
                                            <p>
                                                Ingreso:{" "}
                                                {menu.schedule.opening_time.slice(
                                                    0,
                                                    5
                                                )}{" "}
                                                a{" "}
                                                {menu.schedule.closing_time.slice(
                                                    0,
                                                    5
                                                )}
                                            </p>
                                        </div>

                                        <p className="fw-semibold text-center mb-0">
                                            {formatFecha(menu.date)}
                                        </p>
                                        <br />
                                        <div className="row d-flex justify-content-center m-1">
                                            <div className="col-auto text-center">
                                                <p
                                                    className="fw-bold mb-0"
                                                    style={{
                                                        background: "#FFA800",
                                                        color: "#ffff",
                                                        padding: "0 8px",
                                                        borderRadius: "5px",
                                                    }}
                                                >
                                                    Precio por fecha:
                                                </p>
                                                <p className="fw-bold mb-0">
                                                    Bs. {menu.price}
                                                </p>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <div className="row d-flex justify-content-center m-1">
                                    <button
                                        id="botonReservar"
                                        type="button"
                                        onClick={() => handleReservaClick(menu)}
                                        className="btn fw-bold col-auto"
                                        style={{
                                            background: "#FFA800",
                                            color: "#ffff",
                                        }}
                                    >
                                        Realiza tu reserva
                                    </button>
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
                {showModal && (
                    <Modal
                        onSubmit={handleSubmit}
                        onClose={() => setShowModal(false)}
                        menu={menu}
                    />
                )}
            </div>
        </div>
    );
};

if (document.getElementById("menus")) {
    createRoot(document.getElementById("menus")).render(<TarjetaPlato />);
}
