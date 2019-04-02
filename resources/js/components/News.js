import axios from "axios";
import React, { Component } from "react";

class News extends Component {
    constructor(props) {
        super(props);
        this.state = {
            news: {}
        };
    }

    componentDidMount() {
        const newsSlug = this.props.match.params.slug;

        axios.get(`/api/news/${newsSlug}`).then(response => {
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
                            <div className="card-header">{news.title}</div>
                            <div className="card-body">
                                <p>{news.description}</p>

                                <button className="btn btn-primary btn-sm">
                                    Edit
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default News;
