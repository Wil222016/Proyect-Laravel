import React from "react";
import "/resources/css/pagination.css";

const Pagination = ({ currentPage, lastPage, onPageChange }) => {
    const generatePageNumbers = () => {
        const totalPageNumbersToShow = 10;
        const totalPageNumbers = Math.min(lastPage, totalPageNumbersToShow);

        if (currentPage <= Math.floor(totalPageNumbersToShow / 2) + 1) {
            // Show the first n page numbers
            return Array.from({ length: totalPageNumbers }, (_, i) => i + 1);
        } else if (
            currentPage >=
            lastPage - Math.floor(totalPageNumbersToShow / 2)
        ) {
            // Show the last n page numbers
            return Array.from(
                { length: totalPageNumbers },
                (_, i) => lastPage - totalPageNumbers + i + 1
            );
        } else {
            // Show a range of page numbers centered around the current page
            return Array.from(
                { length: totalPageNumbers },
                (_, i) => currentPage - Math.floor(totalPageNumbers / 2) + i
            );
        }
    };

    return (
        <div className="row">
            <nav aria-label="Page navigation example">
                <ul className="pagination">
                    {currentPage > 1 && (
                        <li className="page-item">
                            <button
                                className="page-link"
                                onClick={() => onPageChange(currentPage - 1)}
                            >
                                &laquo;
                            </button>
                        </li>
                    )}

                    {generatePageNumbers().map((page) => (
                        <li
                            key={page}
                            className={`page-item ${
                                page === currentPage ? "active" : ""
                            }`}
                        >
                            <button
                                className="page-link"
                                onClick={() => onPageChange(page)}
                            >
                                {page}
                            </button>
                        </li>
                    ))}

                    {currentPage < lastPage && (
                        <li className="page-item">
                            <button
                                className="page-link"
                                onClick={() => onPageChange(currentPage + 1)}
                            >
                                &raquo;
                            </button>
                        </li>
                    )}
                </ul>
            </nav>
        </div>
    );
};

export default Pagination;
