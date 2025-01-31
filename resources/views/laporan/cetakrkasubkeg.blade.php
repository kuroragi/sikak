<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Bapelitbang</title>

        <style>

table {
    caption-side: bottom;
    border-collapse: collapse;
}
.table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-green: #00ff22;
    --bs-green-rgb: 0, 255, 34;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #000000;
}
.table > :not(caption) > * > * {
    padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
    vertical-align: inherit;
}
.table-bordered tr > th,
.table-bordered tr > td{
    border: black 1px solid;
}
.table > thead {
    vertical-align: bottom;
}
.table > :not(:first-child) {
    border-top: 2px solid currentColor;
}
.caption-top {
    caption-side: top;
}
.table-sm > :not(caption) > * > * {
    padding: 0.25rem 0.25rem;
}
.table-bordered > :not(caption) > * {
    border-width: 1px 0 black;
}
.table-bordered > :not(caption) > * > * {
    border-width: 0 1px black;
}
.table-borderless > :not(caption) > * > * {
    border-bottom-width: 0;
}
.table-borderless > :not(:first-child) {
    border-top-width: 0;
}
.table-striped > tbody > tr:nth-of-type(odd) > * {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color);
}
.text-start {
    text-align: left !important;
}
.text-end {
    text-align: right !important;
}
.text-center {
    text-align: center !important;
}
.text-wrap {
    white-space: normal !important;
}
.p-0 {
    padding: 0 !important;
}
.p-1 {
    padding: 0.25rem !important;
}
.p-2 {
    padding: 0.5rem !important;
}
.p-3 {
    padding: 1rem !important;
}
.p-4 {
    padding: 1.5rem !important;
}
.p-5 {
    padding: 3rem !important;
}
.px-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
}
.px-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
}
.px-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
}
.px-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
.px-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
}
.py-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}
.py-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
}
.py-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
}
.py-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
.py-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
}
.py-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.m-0 {
    margin: 0 !important;
}
.m-1 {
    margin: 0.25rem !important;
}
.m-2 {
    margin: 0.5rem !important;
}
.m-3 {
    margin: 1rem !important;
}
.m-4 {
    margin: 1.5rem !important;
}
.m-5 {
    margin: 3rem !important;
}
.m-auto {
    margin: auto !important;
}
.mx-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
}
.mx-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
}
.mx-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
}
.mx-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
}
.mx-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
}
.mx-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
}
.mx-auto {
    margin-right: auto !important;
    margin-left: auto !important;
}
.my-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}
.my-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
}
.my-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
}
.my-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
}
.my-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
}
.my-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
}
.mb-3 {
    margin-bottom: 1rem !important;
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.row > * {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-top: var(--bs-gutter-y);
}
.col {
    flex: 1 0 0%;
}
.row-cols-auto > * {
    flex: 0 0 auto;
    width: auto;
}
.row-cols-1 > * {
    flex: 0 0 auto;
    width: 100%;
}
.row-cols-2 > * {
    flex: 0 0 auto;
    width: 50%;
}
.row-cols-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
}
.row-cols-4 > * {
    flex: 0 0 auto;
    width: 25%;
}
.row-cols-5 > * {
    flex: 0 0 auto;
    width: 20%;
}
.row-cols-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
}
.container-body {
    display: flex;
}

content {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-top: var(--bs-gutter-y);
}
footer {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
    bottom: 0;
    width: 100%;
    min-height: 60px; /* Height of the footer */
    background: #6cf;
}
.col-auto {
    flex: 0 0 auto;
    width: auto;
}
.col-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
}
.col-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
}
.col-3 {
    flex: 0 0 auto;
    width: 25%;
}
.col-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}
.col-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
}
.col-6 {
    flex: 0 0 auto;
    width: 50%;
}
.col-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
}
.col-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.col-9 {
    flex: 0 0 auto;
    width: 75%;
}
.col-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
}
.col-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
}
.col-12 {
    flex: 0 0 auto;
    width: 100%;
}
.offset-1 {
    margin-left: 8.33333333%;
}
.offset-2 {
    margin-left: 16.66666667%;
}
.offset-3 {
    margin-left: 25%;
}
.offset-4 {
    margin-left: 33.33333333%;
}
.offset-5 {
    margin-left: 41.66666667%;
}
.offset-6 {
    margin-left: 50%;
}
.offset-7 {
    margin-left: 58.33333333%;
}
.offset-8 {
    margin-left: 66.66666667%;
}
.offset-9 {
    margin-left: 75%;
}
.offset-10 {
    margin-left: 83.33333333%;
}
.offset-11 {
    margin-left: 91.66666667%;
}
.g-0,
.gx-0 {
    --bs-gutter-x: 0;
}
.g-0,
.gy-0 {
    --bs-gutter-y: 0;
}
.g-1,
.gx-1 {
    --bs-gutter-x: 0.25rem;
}
.g-1,
.gy-1 {
    --bs-gutter-y: 0.25rem;
}
.g-2,
.gx-2 {
    --bs-gutter-x: 0.5rem;
}
.g-2,
.gy-2 {
    --bs-gutter-y: 0.5rem;
}
.g-3,
.gx-3 {
    --bs-gutter-x: 1rem;
}
.g-3,
.gy-3 {
    --bs-gutter-y: 1rem;
}
.g-4,
.gx-4 {
    --bs-gutter-x: 1.5rem;
}
.g-4,
.gy-4 {
    --bs-gutter-y: 1.5rem;
}
.g-5,
.gx-5 {
    --bs-gutter-x: 3rem;
}
.g-5,
.gy-5 {
    --bs-gutter-y: 3rem;
}
@media (min-width: 576px) {
    .col-sm {
        flex: 1 0 0%;
    }
    .row-cols-sm-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-sm-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-sm-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-sm-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-sm-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-sm-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-sm-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-sm-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-sm-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-sm-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-sm-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-sm-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-sm-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-sm-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-sm-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-sm-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-sm-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-sm-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-sm-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-sm-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-sm-0 {
        margin-left: 0;
    }
    .offset-sm-1 {
        margin-left: 8.33333333%;
    }
    .offset-sm-2 {
        margin-left: 16.66666667%;
    }
    .offset-sm-3 {
        margin-left: 25%;
    }
    .offset-sm-4 {
        margin-left: 33.33333333%;
    }
    .offset-sm-5 {
        margin-left: 41.66666667%;
    }
    .offset-sm-6 {
        margin-left: 50%;
    }
    .offset-sm-7 {
        margin-left: 58.33333333%;
    }
    .offset-sm-8 {
        margin-left: 66.66666667%;
    }
    .offset-sm-9 {
        margin-left: 75%;
    }
    .offset-sm-10 {
        margin-left: 83.33333333%;
    }
    .offset-sm-11 {
        margin-left: 91.66666667%;
    }
    .g-sm-0,
    .gx-sm-0 {
        --bs-gutter-x: 0;
    }
    .g-sm-0,
    .gy-sm-0 {
        --bs-gutter-y: 0;
    }
    .g-sm-1,
    .gx-sm-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-sm-1,
    .gy-sm-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-sm-2,
    .gx-sm-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-sm-2,
    .gy-sm-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-sm-3,
    .gx-sm-3 {
        --bs-gutter-x: 1rem;
    }
    .g-sm-3,
    .gy-sm-3 {
        --bs-gutter-y: 1rem;
    }
    .g-sm-4,
    .gx-sm-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-sm-4,
    .gy-sm-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-sm-5,
    .gx-sm-5 {
        --bs-gutter-x: 3rem;
    }
    .g-sm-5,
    .gy-sm-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 768px) {
    .col-md {
        flex: 1 0 0%;
    }
    .row-cols-md-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-md-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-md-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-md-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-md-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-md-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-md-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-md-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-md-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-md-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-md-2_5 {
        flex: 0 0 auto;
        width: 20%;
    }
    .col-md-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-md-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-md-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-md-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-md-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-md-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-md-9_5 {
        flex: 0 0 auto;
        width: 80%;
    }
    .col-md-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-md-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-md-0 {
        margin-left: 0;
    }
    .offset-md-1 {
        margin-left: 8.33333333%;
    }
    .offset-md-2 {
        margin-left: 16.66666667%;
    }
    .offset-md-3 {
        margin-left: 25%;
    }
    .offset-md-4 {
        margin-left: 33.33333333%;
    }
    .offset-md-5 {
        margin-left: 41.66666667%;
    }
    .offset-md-6 {
        margin-left: 50%;
    }
    .offset-md-7 {
        margin-left: 58.33333333%;
    }
    .offset-md-8 {
        margin-left: 66.66666667%;
    }
    .offset-md-9 {
        margin-left: 75%;
    }
    .offset-md-10 {
        margin-left: 83.33333333%;
    }
    .offset-md-11 {
        margin-left: 91.66666667%;
    }
    .g-md-0,
    .gx-md-0 {
        --bs-gutter-x: 0;
    }
    .g-md-0,
    .gy-md-0 {
        --bs-gutter-y: 0;
    }
    .g-md-1,
    .gx-md-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-md-1,
    .gy-md-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-md-2,
    .gx-md-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-md-2,
    .gy-md-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-md-3,
    .gx-md-3 {
        --bs-gutter-x: 1rem;
    }
    .g-md-3,
    .gy-md-3 {
        --bs-gutter-y: 1rem;
    }
    .g-md-4,
    .gx-md-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-md-4,
    .gy-md-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-md-5,
    .gx-md-5 {
        --bs-gutter-x: 3rem;
    }
    .g-md-5,
    .gy-md-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 992px) {
    .col-lg {
        flex: 1 0 0%;
    }
    .row-cols-lg-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-lg-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-lg-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-lg-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-lg-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-lg-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-lg-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-lg-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-lg-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-lg-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-lg-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-lg-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-lg-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-lg-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-lg-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-lg-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-lg-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-lg-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-lg-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-lg-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-lg-0 {
        margin-left: 0;
    }
    .offset-lg-1 {
        margin-left: 8.33333333%;
    }
    .offset-lg-2 {
        margin-left: 16.66666667%;
    }
    .offset-lg-3 {
        margin-left: 25%;
    }
    .offset-lg-4 {
        margin-left: 33.33333333%;
    }
    .offset-lg-5 {
        margin-left: 41.66666667%;
    }
    .offset-lg-6 {
        margin-left: 50%;
    }
    .offset-lg-7 {
        margin-left: 58.33333333%;
    }
    .offset-lg-8 {
        margin-left: 66.66666667%;
    }
    .offset-lg-9 {
        margin-left: 75%;
    }
    .offset-lg-10 {
        margin-left: 83.33333333%;
    }
    .offset-lg-11 {
        margin-left: 91.66666667%;
    }
    .g-lg-0,
    .gx-lg-0 {
        --bs-gutter-x: 0;
    }
    .g-lg-0,
    .gy-lg-0 {
        --bs-gutter-y: 0;
    }
    .g-lg-1,
    .gx-lg-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-lg-1,
    .gy-lg-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-lg-2,
    .gx-lg-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-lg-2,
    .gy-lg-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-lg-3,
    .gx-lg-3 {
        --bs-gutter-x: 1rem;
    }
    .g-lg-3,
    .gy-lg-3 {
        --bs-gutter-y: 1rem;
    }
    .g-lg-4,
    .gx-lg-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-lg-4,
    .gy-lg-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-lg-5,
    .gx-lg-5 {
        --bs-gutter-x: 3rem;
    }
    .g-lg-5,
    .gy-lg-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 1200px) {
    .col-xl {
        flex: 1 0 0%;
    }
    .row-cols-xl-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-xl-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-xl-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-xl-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-xl-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-xl-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-xl-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-xl-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-xl-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-xl-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-xl-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-xl-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-xl-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-xl-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-xl-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-xl-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-xl-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-xl-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-xl-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-xl-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-xl-0 {
        margin-left: 0;
    }
    .offset-xl-1 {
        margin-left: 8.33333333%;
    }
    .offset-xl-2 {
        margin-left: 16.66666667%;
    }
    .offset-xl-3 {
        margin-left: 25%;
    }
    .offset-xl-4 {
        margin-left: 33.33333333%;
    }
    .offset-xl-5 {
        margin-left: 41.66666667%;
    }
    .offset-xl-6 {
        margin-left: 50%;
    }
    .offset-xl-7 {
        margin-left: 58.33333333%;
    }
    .offset-xl-8 {
        margin-left: 66.66666667%;
    }
    .offset-xl-9 {
        margin-left: 75%;
    }
    .offset-xl-10 {
        margin-left: 83.33333333%;
    }
    .offset-xl-11 {
        margin-left: 91.66666667%;
    }
    .g-xl-0,
    .gx-xl-0 {
        --bs-gutter-x: 0;
    }
    .g-xl-0,
    .gy-xl-0 {
        --bs-gutter-y: 0;
    }
    .g-xl-1,
    .gx-xl-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-xl-1,
    .gy-xl-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-xl-2,
    .gx-xl-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-xl-2,
    .gy-xl-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-xl-3,
    .gx-xl-3 {
        --bs-gutter-x: 1rem;
    }
    .g-xl-3,
    .gy-xl-3 {
        --bs-gutter-y: 1rem;
    }
    .g-xl-4,
    .gx-xl-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-xl-4,
    .gy-xl-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-xl-5,
    .gx-xl-5 {
        --bs-gutter-x: 3rem;
    }
    .g-xl-5,
    .gy-xl-5 {
        --bs-gutter-y: 3rem;
    }
}
.border {
    border: 1px solid #dee2e6 !important;
}
.border-0 {
    border: 0 !important;
}
.border-top {
    border-top: 1px solid #dee2e6 !important;
}
.border-top-0 {
    border-top: 0 !important;
}
.border-end {
    border-right: 1px solid #dee2e6 !important;
}
.border-end-0 {
    border-right: 0 !important;
}
.border-bottom {
    border-bottom: 1px solid #dee2e6 !important;
}
.border-bottom-0 {
    border-bottom: 0 !important;
}
.border-start {
    border-left: 1px solid #dee2e6 !important;
}
.border-start-0 {
    border-left: 0 !important;
}
.border-primary {
    border-color: #0d6efd !important;
}
.border-secondary {
    border-color: #6c757d !important;
}
.border-success {
    border-color: #198754 !important;
}
.border-teal {
    border-color: #20c997 !important;
}
.border-info {
    border-color: #0dcaf0 !important;
}
.border-warning {
    border-color: #ffc107 !important;
}
.border-orange {
    border-color: #fd7e14 !important;
}
.border-danger {
    border-color: #dc3545 !important;
}
.border-light {
    border-color: #f8f9fa !important;
}
.border-dark {
    border-color: #212529 !important;
}
.border-white {
    border-color: #fff !important;
}
.border-1 {
    border-width: 1px !important;
}
.border-2 {
    border-width: 2px !important;
}
.border-3 {
    border-width: 3px !important;
}
.border-4 {
    border-width: 4px !important;
}
.border-5 {
    border-width: 5px !important;
}
.fs-1 {
    font-size: calc(1.375rem + 1.5vw) !important;
}
.fs-2 {
    font-size: calc(1.325rem + 0.9vw) !important;
}
.fs-3 {
    font-size: calc(1.3rem + 0.6vw) !important;
}
.fs-4 {
    font-size: calc(1.275rem + 0.3vw) !important;
}
.fs-5 {
    font-size: 1.25rem !important;
}
.fs-6 {
    font-size: 1rem !important;
}
.fs-7 {
    font-size: 0.75rem !important;
}
.fs-8 {
    font-size: 0.65rem !important;
}
.fs-9 {
    font-size: 0.55rem !important;
}
.pt-0 {
    padding-top: 0 !important;
}
.pt-1 {
    padding-top: 0.25rem !important;
}
.pt-2 {
    padding-top: 0.5rem !important;
}
.pt-3 {
    padding-top: 1rem !important;
}
.pt-4 {
    padding-top: 1.5rem !important;
}
.pt-5 {
    padding-top: 3rem !important;
}
.align-baseline {
    vertical-align: baseline !important;
}
.align-top {
    vertical-align: top !important;
}
.align-middle {
    vertical-align: middle !important;
}
.align-bottom {
    vertical-align: bottom !important;
}
.page-break{
    page-break-after: always;
}
.tbold{
    font-weight: bold;
}
.w-25 {
    width: 25% !important;
}
.w-30 {
    width: 30% !important;
}
.w-40 {
    width: 40% !important;
}
.w-50 {
    width: 50% !important;
}
.w-75 {
    width: 75% !important;
}
.w-100 {
    width: 100% !important;
}
.w-5 {
    width: 5% !important;
}
.w-10 {
    width: 10% !important;
}
.w-15 {
    width: 15% !important;
}
.w-20 {
    width: 20% !important;
}
.w-45 {
    width: 45% !important;
}
.bb-0{
    border-bottom: 0; 
}
.bg-green {background-color: #00ff22;}
.bg-info {background-color: #0dcaf0;}
.bg-orange {background-color: #fd7e14;}
.h6,
h6 {
    font-size: 1rem;
}
        </style>
    </head>
    <body>
            @if($jenis == 'pdf')

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 border-bottom">
                    <h4 class="h2 text-center">Rancangan Rencana Kerja Anggaran (RKA)</h4>
                </div>
                
                <div class="mb-3 pb-3">
                    <table class="table table-borderless fs-8 m-0 p-0 align-middle mb-3 pb-3">
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">Urusan Pemerintah</td>
                            <td>: [ {{ $urusan->kode }} ] {{ $urusan->ket }}</td>
                        </tr>
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">bidang Urusan</td>
                            <td>: [ {{ $bidurus->kode }} ] {{ $bidurus->ket }}</td>
                        </tr>
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">Organisasi</td>
                            <td>: [ {{ $skpd->kode }} ] {{ $skpd->name }}</td>
                        </tr>
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">Program</td>
                            <td>: [@if(substr($progbid->kode, 0, 4) == 'X.XX') {{ substr($skpd->kode, 0, 4).substr($progbid->kode, -3) }} @else {{ $progbid->kode }} @endif] {{ $progbid->ket }}</td>
                        </tr>
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">Kegiatan</td>
                            <td>: [@if(substr($kegprog->kode, 0, 4) == 'X.XX') {{ substr($skpd->kode, 0, 4).substr($kegprog->kode, -7) }} @else {{ $kegprog->kode }} @endif] {{ $kegprog->ket }}</td>
                        </tr>
                        <tr class="tbold p-0 m-1">
                            <td colspan="2">Subkegiatan</td>
                            <td>: [@if(substr($subkeg->kode, 0, 4) == 'X.XX') {{ substr($skpd->kode, 0, 4).substr($subkeg->kode, -10) }} @else {{ $subkeg->kode }} @endif] {{ $subkeg->ket }}</td>
                        </tr>
                        
                        
                    </table>

                    <table class="table table-bordered fs-8 m-0 p-0 align-middle mb-3 pb-3">
                        <thead>
                            <tr>
                                <th class="w-20">Indikator</th>
                                <th class="w-60">Tolak Ukur</th>
                                <th class="w-20">Target</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Capaian Program</td>
                                <td>{{ $subkeg->kak[0]->icapaianprog }}</td>
                                <td>{{ $subkeg->kak[0]->volcapprog }} {{ $subkeg->kak[0]->satcapprog }}</td>
                            </tr>
                            <tr>
                                <td>Masukan</td>
                                <td>Dana Yang Dibutuhkan</td>
                                <td>Rp.
                                    @php
                                        $total = 0;
                                        foreach ($subkeg->kak as $kak) {
                                            if($periode->sesi == 'rka'){
                                                $total += $kak->kebutuhanakt->sum('total_rka');
                                            }else if($periode->sesi == 'kuappas'){
                                                $total += $kak->kebutuhanakt->sum('total_kuappas');
                                            }else if($periode->sesi == 'apbd'){
                                                $total += $kak->kebutuhanakt->sum('total_apbd');
                                            }else if($periode->sesi == 'final'){
                                                $total += $kak->kebutuhanakt->sum('total_final');
                                            }
                                        }
                                    @endphp
                                    {{ str_replace(',', '.', number_format($total)) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Keluaran Kegiatan</td>
                                <td>{{ $subkeg->kak[0]->ikeluarankeg }}</td>
                                <td>{{ $subkeg->kak[0]->volkelkeg }} {{ $subkeg->kak[0]->satkelkeg }}</td>
                            </tr>
                            <tr>
                                <td>Hasil Kegiatan</td>
                                <td>{{ $subkeg->kak[0]->ihaskeg }}</td>
                                <td>{{ $subkeg->kak[0]->volhaskeg }} {{ $subkeg->kak[0]->sathaskeg }}</td>
                            </tr>
                            <tr>
                                <td>Keluaran Sub Kegiatan</td>
                                <td>{{ $subkeg->indikator }}</td>
                                <td>{{ $subkeg->kak[0]->tarsubkeg }} {{ $subkeg->satuan->satuan }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Pelaksanaan</td>
                                <td colspan="2">{{ date('d-m-Y', strtotime($subkeg->kak->min('dari'))) }} s/d {{ date('d-m-Y', strtotime($subkeg->kak->max('sampai'))) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <table class="table table-bordered border-dark table-sm fs-7" id="tblkak">
                    <thead>
                        <tr class="text-center fs-7 text-wrap">
                            <th scope="col" rowspan="2" class="text-wrap align-middle">Kode Rekening</th>
                            <th scope="col" rowspan="2" class="text-wrap align-middle w-40">Uraian</th>
                            <th scope="col" colspan="5">Rincian Perhitungan</th>
                        </tr>
                        <tr class="text-center fs-7 text-wrap">
                            <th scope="col" class="align-middle">Koefisien</th>
                            <th scope="col" class="align-middle">Satuan</th>
                            <th scope="col" class="align-middle">Harga</th>
                            <th scope="col" class="align-middle">Ppn</th>
                            <th scope="col" class="align-middle">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="7" class="text-start">Belanja Barang</th>
                        </tr>
                        @foreach ($rekap as $r)

                            @if ($r->tipe_keb == 'ssh')
                                <tr class="fs-8">
                                    <td>{{ $r->sshrek??'' }}</td>
                                    <td>{{ $r->sshket }} @if($r->sshspek) ({{ $r->sshspek }}) @endif</td>
                                    <td class="text-center">{{ str_replace('.', ',', number_format($r->jumlah)) }}</td>
                                    <td class="text-center">{{ $r->satssh }}</td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->harga)) }}</td>
                                    <td></td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->total)) }}</td>
                                </tr>
                            @endif
                            
                        @endforeach

                        <tr>
                            <th colspan="7" class="text-start">Belanja Jasa</th>
                        </tr>
                        @foreach ($rekap as $r)

                            @if ($r->tipe_keb == 'sbu')
                                <tr class="fs-8">
                                    <td>{{ $r->sburek??'' }}</td>
                                    <td>{{ $r->sbuket }}</td>
                                    <td class="text-center">{{ str_replace('.', ',', number_format($r->jumlah)) }}</td>
                                    <td class="text-center">{{ $r->satsbu }}</td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->harga)) }}</td>
                                    <td></td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->total)) }}</td>
                                </tr>
                            @endif

                        @endforeach

                        <tr>
                            <th colspan="7" class="text-start">Usulan SSH / SBU</th>
                        </tr>
                        @foreach ($rekap as $r)

                            @if ($r->tipe_keb == 'usulanssh' || $r->tipe_keb == 'usulansbu')
                                <tr>
                                    <td></td>
                                    <td>
                                        @if ($r->tipe_keb == 'usulanssh')
                                            {{ $r->usshket }}
                                        @elseif ($r->tipe_keb == 'usulansbu')
                                            {{ $r->usbuket }}
                                        @endif
                                   </td>
                                    <td class="text-center">{{ str_replace('.', ',', number_format($r->jumlah)) }}</td>
                                    <td class="text-center">
                                        @if ($r->tipe_keb == 'usulanssh')
                                            {{ $r->satussh }}
                                        @elseif ($r->tipe_keb == 'usulansbu')
                                            {{ $r->satusbu }}
                                        @endif
                                    </td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->harga)) }}</td>
                                    <td></td>
                                    <td class="text-end">{{ str_replace(',', '.', number_format($r->total)) }}</td>
                                </tr>
                            @endif
                            
                        @endforeach

                        <tr>
                            <th colspan="7" class="text-start">Belanja Non SSH / SBU</th>
                        </tr>
                        @foreach ($rekapother as $ro)

                            <tr>
                                <td></td>
                                <td>{{ $ro->uraian_lain }}</td>
                                <td class="text-center">@if($ro->jumlah > 0){{ str_replace('.', ',', number_format($ro->jumlah))??'' }}@endif</td>
                                <td class="text-center">{{ $ro->satkeb }}</td>
                                <td class="text-end">@if($ro->harga > 0){{ str_replace(',', '.', number_format($ro->harga))??'' }}@endif</td>
                                <td></td>
                                <td class="text-end">{{ str_replace(',', '.', number_format($ro->total)) }}</td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                    
                    <div class="page-break"></div>
                    
            @endif

    </body>
</html>
