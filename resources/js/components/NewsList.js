import axios from "axios";
import React, { Component } from "react";
import { Link } from "react-router-dom";

class NewsList extends Component {
    constructor() {
        super();
        this.state = {
            news: []
        };
    }

    componentDidMount() {
        axios.get("/api/news").then(response => {
            this.setState({
                news: response.data
            });
        });
    }

    render() {
        const { news } = this.state;
        return (
            <div className="container py-4">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">All News</div>
                            <div className="card-body">
                                <Link
                                    className="btn btn-primary btn-sm mb-3"
                                    to="/create"
                                >
                                    Post a new News
                                </Link>
                                <ul className="list-group list-group-flush">
                                    {news.map(n => (
                                        <Link
                                            className="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                            to={`/${n.id}`}
                                            key={n.id}
                                        >
                                            {n.title}
                                            <span className="badge badge-primary badge-pill">
                                                {n.category_id}
                                            </span>
                                        </Link>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default NewsList;
