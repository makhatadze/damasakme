import {useForm, usePage} from '@inertiajs/inertia-react'
import React from 'react'
import {Tab, Tabs, Form} from "react-bootstrap";

export default function CreateCityArea({close, cities}) {
    const {locales} = usePage().props;
    const localeAttr = [];
    locales.forEach((el) => {
        localeAttr[el] = {
            title: ''
        }
    })

    const {data, setData, post, reset, errors} = useForm({
        city: '',
        ...localeAttr
    });

    const handleLocaleChange = (index, event) => {
        const values = data;
        const updatedValue = event.target.name;
        values[index][updatedValue] = event.target.value;

        setData(values);
    };

    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        post(route('city-areas.store'), {
            data,
            onSuccess: () => {
                reset(),
                    close()
            },
        });
    }

    return (
        <>
            <form onSubmit={onSubmit}>
                <div className="modal-body">
                    <div className="form-group">
                        <label htmlFor="title" className="col-form-label">{__('City')}:</label>
                        <Form.Select name={'city'} id={'city'} onChange={onChange} aria-label="Default select example">
                            <option value="">{__('Select City')}</option>

                            {cities.map((city) => (
                                <option value={city.id}>{city.title}</option>
                            ))}
                        </Form.Select>
                        {errors && <div className='text-danger mt-1'>{errors.city}</div>}
                    </div>

                    <Tabs className="mb-3">
                        {
                            locales.map((locale) => (
                                <Tab eventKey={locale} title={locale} key={locale}>
                                    <div className="form-group">
                                        <label htmlFor="title" className="col-form-label">{__('Title')}:</label>
                                        <input type="text" className="form-control" name={'title'} value={data.name}
                                               onChange={(event) =>
                                                   handleLocaleChange(locale, event)
                                               } id="title"/>
                                        {errors && <div className='text-danger mt-1'>{errors[`${locale}.title`]}</div>}
                                    </div>
                                </Tab>
                            ))
                        }
                    </Tabs>

                </div>
                <div className="modal-footer">
                    <button type="button" className="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">{__('Close')}</button>
                    <button type="submit" className="btn bg-gradient-primary">{__('Save')}</button>
                </div>
            </form>
        </>

    )
}
