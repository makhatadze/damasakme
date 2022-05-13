import {usePage} from '@inertiajs/inertia-react'
import React, {useEffect} from 'react'
import {Accordion} from "react-bootstrap";

export default function ViewApplication({close, model}) {

    const {locales} = usePage().props;

    return (
        <>
            <table className="table table-borderless align-items-center ">
                <tbody>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">
                                # {model.id}
                            </h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">
                                <a href={model.file} target="blank" className="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                    className="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF
                                </a>
                            </h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('first name')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.name}</h6>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('last name')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.lastname}</h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('birthday')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.birthday}</h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('email')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.email}</h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('gender')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.gender}</h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('city')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.city}</h6>
                        </div>
                    </td>
                </tr>
                {
                    model.area ? (
                        <tr>
                            <td>
                                <div className="text-center">
                                    <h6 className="text-sm mb-0">{__('area')}</h6>
                                </div>
                            </td>
                            <td className="align-middle text-sm">
                                <div className="col text-center">
                                    <h6 className="text-sm mb-0">{model.area}</h6>
                                </div>
                            </td>
                        </tr>
                    ) : null
                }
                {
                    model.district ? (
                        <tr>
                            <td>
                                <div className="text-center">
                                    <h6 className="text-sm mb-0">{__('district')}</h6>
                                </div>
                            </td>
                            <td className="align-middle text-sm">
                                <div className="col text-center">
                                    <h6 className="text-sm mb-0">{model.district}</h6>
                                </div>
                            </td>
                        </tr>
                    ) : null
                }
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('address')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.address}</h6>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div className="text-center">
                            <h6 className="text-sm mb-0">{__('created_at')}</h6>
                        </div>
                    </td>
                    <td className="align-middle text-sm">
                        <div className="col text-center">
                            <h6 className="text-sm mb-0">{model.joined}</h6>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <Accordion>
                {
                    model.educations && model.educations.map((el, index) => {
                        return (
                            <Accordion.Item
                                eventKey={`acc-${el.id}`}>
                                <Accordion.Header>
                                    {el.degree}
                                </Accordion.Header>
                                {
                                    el.type ? (
                                        <Accordion.Body>
                                            <table className="table table-borderless align-items-center ">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div className="text-center">
                                                            <h6 className="text-sm mb-0">{__('school')}</h6>
                                                        </div>
                                                    </td>
                                                    <td className="align-middle text-sm">
                                                        <div className="col text-center">
                                                            <h6 className="text-sm mb-0">{el.school}</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="text-center">
                                                            <h6 className="text-sm mb-0">{__('profession')}</h6>
                                                        </div>
                                                    </td>
                                                    <td className="align-middle text-sm">
                                                        <div className="col text-center">
                                                            <h6 className="text-sm mb-0">{el.profession}</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="text-center">
                                                            <h6 className="text-sm mb-0">{__('start date')}</h6>
                                                        </div>
                                                    </td>
                                                    <td className="align-middle text-sm">
                                                        <div className="col text-center">
                                                            <h6 className="text-sm mb-0">{el.start_date}</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="text-center">
                                                            <h6 className="text-sm mb-0">{__('end date')}</h6>
                                                        </div>
                                                    </td>
                                                    <td className="align-middle text-sm">
                                                        <div className="col text-center">
                                                            <h6 className="text-sm mb-0">{el.end_date}</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </Accordion.Body>

                                    ) : null
                                }
                            </Accordion.Item>
                        )
                    })
                }
                <Accordion.Item
                    eventKey={`acc-jobs`}>
                    <Accordion.Header>
                        {__('Field of employment')}
                    </Accordion.Header>
                    <Accordion.Body>
                        <div className="row">
                            {
                                model.jobs && model.jobs.map((job) => (
                                    <div className="col text-center">
                                        <h6 className="text-sm mb-0">{job.title}</h6>
                                    </div>
                                ))
                            }
                        </div>
                    </Accordion.Body>

                </Accordion.Item>
            </Accordion>
        </>

    )
}
