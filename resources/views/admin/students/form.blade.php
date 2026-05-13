<div>

    <label>Name</label>

    <br>

    <input
        type="text"
        name="name"
        value="{{ old('name', $student->name ?? '') }}"
    >

</div>

<br>

<div>

    <label>Email</label>

    <br>

    <input
        type="email"
        name="email"
        value="{{ old('email', $student->email ?? '') }}"
    >

</div>

<br>

<div>

    <label>Phone</label>

    <br>

    <input
        type="text"
        name="phone"
        value="{{ old('phone', $student->phone ?? '') }}"
    >

</div>

<br>

<div>

    <label>Address</label>

    <br>

    <textarea
        name="address"
    >{{ old('address', $student->address ?? '') }}</textarea>

</div>

<br>
